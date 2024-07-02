<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Formulario</title>
    <link rel="stylesheet" href="Netsecom.css" />
</head>

<body>
    <?php include 'database.php'; ?>
    <div class="form-container">
        <div class="column">
            <div class="calendar-container">
                <div class="year-selector">
                    <label for="year-select">Año:</label>
                    <select id="year-select"></select>
                </div>
                <div class="calendar-header">
                    <button id="prev-month"> anterior
                    </button>
                    <h2 id="month-year"></h2>
                    <button id="next-month">siguente</button>
                </div>
                <div class="calendar-body">
                    <div class="calendar-weekdays">
                        <div>Su</div>
                        <div>Mo</div>
                        <div>Tu</div>
                        <div>We</div>
                        <div>Th</div>
                        <div>Fr</div>
                        <div>Sa</div>
                    </div>
                    <div class="calendar-dates" id="calendar-dates"></div>
                </div>
            </div>
            <div class="form-group">
                <label for="person-recipient">Nombre de la persona que recibe el equipo</label>
                <select id="person-recipient">
                <?php
                    $result = $conn->query("SELECT Nombre FROM empleado");
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row['IDEmpeado'] . "'>" . $row['Nombre'] . "</option>";
                        }
                    } else {
                        echo "<option value=''>No hay datos</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="client">Cliente</label>
                <select id="client">
                    <?php
                    $result = $conn->query("SELECT Nombre FROM cliente");
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row['Nombre'] . "'>" . $row['Nombre'] . "</option>";
                        }
                    } else {
                        echo "<option value=''>No hay datos</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="person-deliver">Nombre de la persona que entrega el equipo</label>
                <input type="text" id="person-deliver" />
            </div>
        </div>
        <div class="column">
            <div class="form-group">
                <label for="equipment-received">Equipo Recibido</label>
                <select id="equipment-received">
                    <?php
                    $result = $conn->query("SELECT Nombre FROM equipocaracteristicas");
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row['Nombre'] . "'>" . $row['Nombre'] . "</option>";
                        }
                    } else {
                        echo "<option value=''>No hay datos</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="brand-model">Marca y Modelo del equipo</label>
                <select id="brand-model">
                    <?php
                    $result = $conn->query("SELECT Marca, Modelo FROM equipocaracteristicas");
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row['Marca'] . " - " . $row['Modelo'] . "'>" . $row['Marca'] . " - " . $row['Modelo'] . "</option>";
                        }
                    } else {
                        echo "<option value=''>No hay datos</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label>Estado del equipo</label>
                <div class="checkbox-container">
                    <div>
                        <input type="checkbox" id="hardware-ok" />
                        <label for="hardware-ok">Hardware Funcionando Correctamente</label>
                    </div>
                    <div>
                        <input type="checkbox" id="hardware-issues" />
                        <label for="hardware-issues">Hardware con algunas características disfuncionales</label>
                    </div>
                    <div>
                        <input type="checkbox" id="software-damaged" />
                        <label for="software-damaged">Software dañado</label>
                    </div>
                    <div>
                        <input type="checkbox" id="software-issues" />
                        <label for="software-issues">Software funciona incorrectamente</label>
                    </div>
                    <div>
                        <input type="checkbox" id="components-update" />
                        <label for="components-update">Actualización de componentes</label>
                    </div>
                    <div>
                        <input type="checkbox" id="software-installation" />
                        <label for="software-installation">Instalación de software</label>
                    </div>
                    <div>
                        <input type="checkbox" id="preventive-maintenance" />
                        <label for="preventive-maintenance">Mantenimiento Preventivo</label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Accesorios y Periféricos Recibidos</label>
                <div class="checkbox-container">
                    <div>
                        <input type="checkbox" id="power-cable" />
                        <label for="power-cable">Cable de Alimentación</label>
                    </div>
                    <div>
                        <input type="checkbox" id="data-cable" />
                        <label for="data-cable">Cable de Datos</label>
                    </div>
                    <div>
                        <input type="checkbox" id="adapters" />
                        <label for="adapters">Adaptadores</label>
                    </div>
                    <div>
                        <input type="checkbox" id="case" />
                        <label for="case">Funda</label>
                    </div>
                    <div>
                        <input type="checkbox" id="bag" />
                        <label for="bag">Bolso</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="column">
            <div class="form-group">
                <label for="windows-password">Contraseña de Windows</label>
                <input type="text" id="windows-password" />
            </div>
            <div class="form-group">
                <label for="observations">Observaciones</label>
                <input type="text" id="observations" />
            </div>
            <div class="form-group">
                <label for="upload-photo">Adjuntar foto del equipo</label>
                <input type="file" id="upload-photo" />
            </div>
            <div class="form-group">
                <label>Conforme con la entrega</label>
                <div>
                    <input type="radio" id="delivery-yes" name="delivery" value="yes" />
                    <label for="delivery-yes">Sí</label>
                </div>
                <div>
                    <input type="radio" id="delivery-no" name="delivery" value="no" />
                    <label for="delivery-no">No</label>
                </div>
                <!-- Botones de guardar e imprimir -->
                <div class="button-container">
                    <button id="save-button">Guardar</button>
                    <button id="print-button">Imprimir</button>
                </div>
                <!--logo-->
                <div class="logo-container">
                    <img src="https://i.ibb.co/zXXRrn8/img11.jpg" alt="LOGO" border="0" />
                </div>
            </div>
        </div>
    </div>
    <?php $conn->close(); ?>
    <script src="calendario_scripts.js"></script>
    <script src="formulario_scripts.js"></script>
</body>

</html>
