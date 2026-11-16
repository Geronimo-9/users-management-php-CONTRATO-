<?php require __DIR__ . '/../layouts/header.php'; ?>
<?php require __DIR__ . '/../layouts/menu.php'; ?>

<h1>Detalle de contrato</h1>

<?php if (!empty($message)): ?>
    <div class="alert-error">
        <?= htmlspecialchars($message, ENT_QUOTES, 'UTF-8') ?>
    </div>
<?php endif; ?>

<table class="detail-table">
    <tr>
        <th>ID</th>
        <td><?= htmlspecialchars($contrato->getId(), ENT_QUOTES, 'UTF-8') ?></td>
    </tr>
    <tr>
        <th>Usuario ID</th>
        <td><?= htmlspecialchars($contrato->getUsuarioId(), ENT_QUOTES, 'UTF-8') ?></td>
    </tr>
    <tr>
        <th>Empresa</th>
        <td><?= htmlspecialchars($contrato->getEmpresa(), ENT_QUOTES, 'UTF-8') ?></td>
    </tr>
    <tr>
        <th>Empleado</th>
        <td><?= htmlspecialchars($contrato->getEmpleado(), ENT_QUOTES, 'UTF-8') ?></td>
    </tr>
    <tr>
        <th>Funciones</th>
        <td><?= htmlspecialchars($contrato->getFunciones(), ENT_QUOTES, 'UTF-8') ?></td>
    </tr>
    <tr>
        <th>Monto</th>
        <td><?= htmlspecialchars($contrato->getMonto(), ENT_QUOTES, 'UTF-8') ?></td>
    </tr>
    <tr>
        <th>Frecuencia de pago</th>
        <td><?= htmlspecialchars($contrato->getFrecuenciaPago(), ENT_QUOTES, 'UTF-8') ?></td>
    </tr>
    <tr>
        <th>Fecha de firma</th>
        <td><?= htmlspecialchars($contrato->getFechaFirma(), ENT_QUOTES, 'UTF-8') ?></td>
    </tr>
    <tr>
        <th>Fecha de inicio</th>
        <td><?= htmlspecialchars($contrato->getFechaInicio(), ENT_QUOTES, 'UTF-8') ?></td>
    </tr>
    <tr>
        <th>Fecha de fin</th>
        <td><?= htmlspecialchars($contrato->getFechaFin(), ENT_QUOTES, 'UTF-8') ?></td>
    </tr>
    <tr>
        <th>Estado</th>
        <td><?= htmlspecialchars($contrato->getEstado(), ENT_QUOTES, 'UTF-8') ?></td>
    </tr>
</table>

<p style="margin-top: 16px;">
    <a class="btn btn-warning" href="?route=contratos.edit&amp;id=<?= urlencode($contrato->getId()) ?>">Editar</a>
    &nbsp;
    <a class="btn" href="?route=contratos.index">Volver al listado</a>
</p>

<?php require __DIR__ . '/../layouts/footer.php'; ?>