<?php require __DIR__ . '/../layouts/header.php'; ?>
<?php require __DIR__ . '/../layouts/menu.php'; ?>

<h1>Lista de contratos</h1>

<?php if (!empty($message)): ?>
    <div class="alert-error">
        <?= htmlspecialchars($message, ENT_QUOTES, 'UTF-8') ?>
    </div>
<?php endif; ?>

<?php if (!empty($success)): ?>
    <div class="alert-success">
        <?= htmlspecialchars($success, ENT_QUOTES, 'UTF-8') ?>
    </div>
<?php endif; ?>

<p>
    <a class="btn btn-primary" href="?route=contratos.create">+ Registrar contrato</a>
</p>

<?php if (empty($contratos)): ?>
    <p>No hay contratos registrados todavía.</p>
<?php else: ?>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Empresa</th>
                <th>Empleado</th>
                <th>Monto</th>
                <th>Frecuencia</th>
                <th>Inicio</th>
                <th>Fin</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($contratos as $contrato): ?>
                <tr>
                    <td class="col-id"><?= htmlspecialchars($contrato->getId(), ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($contrato->getEmpresa(), ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($contrato->getEmpleado(), ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($contrato->getMonto(), ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($contrato->getFrecuenciaPago(), ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($contrato->getFechaInicio(), ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($contrato->getFechaFin(), ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($contrato->getEstado(), ENT_QUOTES, 'UTF-8') ?></td>
                    <td class="col-actions">
                        <a class="btn btn-sm" href="?route=contratos.show&amp;id=<?= urlencode($contrato->getId()) ?>">Ver</a>
                        <a class="btn btn-warning btn-sm" href="?route=contratos.edit&amp;id=<?= urlencode($contrato->getId()) ?>">Editar</a>
                        <form method="POST" action="?route=contratos.delete" style="display:inline;"
                            onsubmit="return confirmDelete(this);"
                            data-name="contrato de <?= htmlspecialchars($contrato->getEmpleado(), ENT_QUOTES, 'UTF-8') ?>">
                            <input type="hidden" name="id" value="<?= htmlspecialchars($contrato->getId(), ENT_QUOTES, 'UTF-8') ?>">
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>

<?php require __DIR__ . '/../layouts/footer.php'; ?>