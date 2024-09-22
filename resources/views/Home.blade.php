<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Controle do Robô</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Controle do Robô</h2>

        <div id="error-message" class="alert alert-danger d-none" role="alert"></div>

        <div class="row">
            <div class="col-md-6">
                <h4>Movimentos do Braço Esquerdo</h4>
                <div class="mb-3">
                    <label for="left_elbow" class="form-label">Cotovelo Esquerdo</label>
                    <select id="left_elbow" class="form-select" onchange="updateWristStatus('left')">
                        <option selected value="1">Em Repouso</option>
                        <option value="2">Levemente Contraído</option>
                        <option value="3">Contraído</option>
                        <option value="4">Fortemente Contraído</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="left_wrist" class="form-label">Pulso Esquerdo</label>
                    <select id="left_wrist" class="form-select" disabled>
                        <option value="1">Rotação para -90º</option>
                        <option value="2">Rotação para -45º</option>
                        <option selected value="3">Em Repouso</option>
                        <option value="4">Rotação para 45º</option>
                        <option value="5">Rotação para 90º</option>
                    </select>
                </div>
            </div>

            <div class="col-md-6">
                <h4>Movimentos do Braço Direito</h4>
                <div class="mb-3">
                    <label for="right_elbow" class="form-label">Cotovelo Direito</label>
                    <select id="right_elbow" class="form-select" onchange="updateWristStatus('right')">
                        <option selected value="1">Em Repouso</option>
                        <option value="2">Levemente Contraído</option>
                        <option value="3">Contraído</option>
                        <option value="4">Fortemente Contraído</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="right_wrist" class="form-label">Pulso Direito</label>
                    <select id="right_wrist" class="form-select" disabled>
                        <option value="1">Rotação para -90º</option>
                        <option value="2">Rotação para -45º</option>
                        <option selected value="3">Em Repouso</option>
                        <option value="4">Rotação para 45º</option>
                        <option value="5">Rotação para 90º</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-12">
                <h4>Movimentos da Cabeça</h4>
                <div class="mb-3">
                    <label for="head_rotation" class="form-label">Rotação da Cabeça</label>
                    <select id="head_rotation" class="form-select">
                        <option value="1">Rotação -90º</option>
                        <option value="2">Rotação -45º</option>
                        <option selected value="3">Em Repouso</option>
                        <option value="4">Rotação 45º</option>
                        <option value="5">Rotação 90º</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="head_tilt" class="form-label">Inclinação da Cabeça</label>
                    <select id="head_tilt" class="form-select" onchange="updateHeadRotationStatus()">
                        <option value="1">Para Cima</option>
                        <option selected value="2">Em Repouso</option>
                        <option value="3">Para Baixo</option>
                    </select>
                </div>
            </div>
        </div>

        <button class="btn btn-primary mt-3" onclick="sendRobotStatus()">Enviar Movimentos</button>

        <div id="robot-status" class="mt-4">
            <h4>Status Atual do Robô</h4>
            <pre id="status-display" class="bg-light p-3"></pre>
        </div>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            fetchRobotStatus();
        });

        function updateWristStatus(side) {
            let elbow = document.getElementById(`${side}_elbow`);
            let wrist = document.getElementById(`${side}_wrist`);

            // Se o cotovelo estiver "Fortemente Contraído", habilita o pulso
            if (elbow.value == '4') {
                wrist.disabled = false;
            } else {
                wrist.disabled = true;
                wrist.value = "3"; // Volta ao estado "Em Repouso"
            }
        }

        function updateHeadRotationStatus() {
            let headTilt = document.getElementById("head_tilt");
            let headRotation = document.getElementById("head_rotation");

            // Se a cabeça estiver inclinada para baixo, desabilita a rotação
            if (headTilt.value == '3') {
                headRotation.disabled = true;
                headRotation.value = "3"; // Volta ao estado "Em Repouso"
            } else {
                headRotation.disabled = false;
            }
        }

        async function sendRobotStatus() {
            let leftElbow = document.getElementById('left_elbow').value;
            let leftWrist = document.getElementById('left_wrist').value;
            let rightElbow = document.getElementById('right_elbow').value;
            let rightWrist = document.getElementById('right_wrist').value;
            let headRotation = document.getElementById('head_rotation').value;
            let headTilt = document.getElementById('head_tilt').value;

            leftWrist = document.getElementById('left_wrist').disabled ? "3" : leftWrist;
            rightWrist = document.getElementById('right_wrist').disabled ? "3" : rightWrist;

            // Monta o payload
            const payload = {};

            if (!document.getElementById('left_wrist').disabled) {
                payload.left_wrist_id = parseInt(leftWrist);
            }
            if (!document.getElementById('right_wrist').disabled) {
                payload.right_wrist_id = parseInt(rightWrist);
            }
            if (!document.getElementById('left_elbow').disabled) {
                payload.left_elbow_id = parseInt(leftElbow);
            }
            if (!document.getElementById('right_elbow').disabled) {
                payload.right_elbow_id = parseInt(rightElbow);
            }
            if (!document.getElementById('head_rotation').disabled) {
                payload.head_rotation_id = parseInt(headRotation);
            }
            if (!document.getElementById('head_tilt').disabled) {
                payload.head_tilt_id = parseInt(headTilt);
            }

            try {
                // Faz a requisição para a API
                let response = await fetch(`api/move-robot/1`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify(payload)
                });

                // Verifica a resposta
                if (response.ok) {
                    let data = await response.json();
                    window.location.reload();
                }
                if (!response.ok) {
                    const errorDetails = await response.json();
                    document.getElementById('error-message').innerText = errorDetails;
                    document.getElementById('error-message').classList.remove('d-none');
                    throw new Error(`Erro ao enviar movimentos: ${response.statusText + ' - ' + errorDetails}`);
                }
            } catch (error) {
                console.error('Erro na requisição:', error);
            }

            fetchRobotStatus();
        }

        async function fetchRobotStatus() {

            try {
                let response = await fetch('/api/get-status/robot/1');
                if (!response.ok) {
                    throw new Error('Erro ao buscar o status do robô');
                }
                let status = await response.json();

                function displayRobotStatus(status) {
                    const statusDisplay = document.getElementById('status-display');
                    // Limpa o conteúdo anterior
                    statusDisplay.textContent = '';

                    // Cria uma string com as informações do status
                    const movements = [
                        `Cotovelo Esquerdo: ${status.left_elbow_id} - ${status.left_elbow_movement.description}`,
                        `Cotovelo Direito: ${status.right_elbow_id} - ${status.right_elbow_movement.description}`,
                        `Pulso Esquerdo: ${status.left_wrist_id} - ${status.left_wrist_movement.description}`,
                        `Pulso Direito: ${status.right_wrist_id} - ${status.right_wrist_movement.description}`,
                        `Rotação da Cabeça: ${status.head_rotation_id} - ${status.head_rotation_movement.description}`,
                        `Inclinação da Cabeça: ${status.head_tilt_id} - ${status.head_tilt_movement.description}`
                    ];

                    // Adiciona as informações ao statusDisplay
                    movements.forEach(movement => {
                        const movementElement = document.createElement('div');
                        movementElement.textContent = movement;
                        statusDisplay.appendChild(movementElement);
                    });
                }

                displayRobotStatus(status);

                // Atualiza os selects com base no status
                document.getElementById('left_elbow').value = status.left_elbow_id;
                document.getElementById('right_elbow').value = status.right_elbow_id;
                document.getElementById('left_wrist').value = status.left_wrist_id;
                document.getElementById('right_wrist').value = status.right_wrist_id;
                document.getElementById('head_rotation').value = status.head_rotation_id;
                document.getElementById('head_tilt').value = status.head_tilt_id;

                // Atualiza o estado do pulso com base na posição do cotovelo
                updateWristStatus('left');
                updateWristStatus('right');
                updateHeadRotationStatus();

            } catch (error) {
                console.error('Erro ao buscar o status:', error);
            }
        }
    </script>
</body>
</html>
