<?php require __DIR__ . '/../layouts/header.php'; ?>
<?php require __DIR__ . '/../layouts/menu.php'; ?>

<h1>Editar contrato</h1>

<?php if (!empty($message)): ?>
    <div class="alert-error">
        <?= htmlspecialchars($message, ENT_QUOTES, 'UTF-8') ?>
    </div>
<?php endif; ?>

<form method="POST" action="?route=contratos.update">
    <input type="hidden" name="id" value="<?= htmlspecialchars($old['id'] ?? $contrato->getId(), ENT_QUOTES, 'UTF-8') ?>">

    <div class="form-group">
        <label for="empresa">Empresa</label><br>
        <input type="text" id="empresa" name="empresa"
            value="<?= htmlspecialchars($old['empresa'] ?? $contrato->getEmpresa(), ENT_QUOTES, 'UTF-8') ?>">
        <?php if (!empty($errors['empresa'])): ?>
            <div class="field-error"><?= htmlspecialchars($errors['empresa'], ENT_QUOTES, 'UTF-8') ?></div>
        <?php endif; ?>
    </div>

    <div class="form-group">
        <label for="empleado">Empleado</label><br>
        <input type="text" id="empleado" name="empleado"
            value="<?= htmlspecialchars($old['empleado'] ?? $contrato->getEmpleado(), ENT_QUOTES, 'UTF-8') ?>">
        <?php if (!empty($errors['empleado'])): ?>
            <div class="field-error"><?= htmlspecialchars($errors['empleado'], ENT_QUOTES, 'UTF-8') ?></div>
        <?php endif; ?>
    </div>

    <div class="form-group">
        <label for="funciones">Funciones</label><br>
        <textarea id="funciones" name="funciones" rows="3" cols="40"><?= htmlspecialchars($old['funciones'] ?? $contrato->getFunciones(), ENT_QUOTES, 'UTF-8') ?></textarea>
        <?php if (!empty($errors['funciones'])): ?>
            <div class="field-error"><?= htmlspecialchars($errors['funciones'], ENT_QUOTES, 'UTF-8') ?></div>
        <?php endif; ?>
    </div>

    <div class="form-group">
        <label for="monto">Monto</label><br>
        <input type="number" step="0.01" min="0" id="monto" name="monto"
            value="<?= htmlspecialchars($old['monto'] ?? $contrato->getMonto(), ENT_QUOTES, 'UTF-8') ?>">
        <?php if (!empty($errors['monto'])): ?>
            <div class="field-error"><?= htmlspecialchars($errors['monto'], ENT_QUOTES, 'UTF-8') ?></div>
        <?php endif; ?>
    </div>

    <div class="form-group">
        <label for="frecuencia_pago">Frecuencia de pago</label><br>
        <select id="frecuencia_pago" name="frecuencia_pago">
            <?php foreach ($frecuenciaOptions as $opt): ?>
                <option value="<?= htmlspecialchars($opt, ENT_QUOTES, 'UTF-8') ?>" <?= (($old['frecuencia_pago'] ?? $contrato->getFrecuenciaPago()) === $opt) ? 'selected' : '' ?>>
                    <?= htmlspecialchars($opt, ENT_QUOTES, 'UTF-8') ?>
                </option>
            <?php endforeach; ?>
        </select>
        <?php if (!empty($errors['frecuencia_pago'])): ?>
            <div class="field-error"><?= htmlspecialchars($errors['frecuencia_pago'], ENT_QUOTES, 'UTF-8') ?></div>
        <?php endif; ?>
    </div>

    <div class="form-group">
        <label for="fecha_firma">Fecha de firma</label><br>
        <input type="date" id="fecha_firma" name="fecha_firma"
            value="<?= htmlspecialchars($old['fecha_firma'] ?? $contrato->getFechaFirma(), ENT_QUOTES, 'UTF-8') ?>">
        <?php if (!empty($errors['fecha_firma'])): ?>
            <div class="field-error"><?= htmlspecialchars($errors['fecha_firma'], ENT_QUOTES, 'UTF-8') ?></div>
        <?php endif; ?>
    </div>

    <div class="form-group">
        <label for="fecha_inicio">Fecha de inicio</label><br>
        <input type="date" id="fecha_inicio" name="fecha_inicio"
            value="<?= htmlspecialchars($old['fecha_inicio'] ?? $contrato->getFechaInicio(), ENT_QUOTES, 'UTF-8') ?>">
        <?php if (!empty($errors['fecha_inicio'])): ?>
            <div class="field-error"><?= htmlspecialchars($errors['fecha_inicio'], ENT_QUOTES, 'UTF-8') ?></div>
        <?php endif; ?>
    </div>

    <div class="form-group">
        <label for="fecha_fin">Fecha de fin</label><br>
        <input type="date" id="fecha_fin" name="fecha_fin"
            value="<?= htmlspecialchars($old['fecha_fin'] ?? $contrato->getFechaFin(), ENT_QUOTES, 'UTF-8') ?>">
        <?php if (!empty($errors['fecha_fin'])): ?>
            <div class="field-error"><?= htmlspecialchars($errors['fecha_fin'], ENT_QUOTES, 'UTF-8') ?></div>
        <?php endif; ?>
    </div>

    <div class="form-group">
        <label for="estado">Estado</label><br>
        <select id="estado" name="estado">
            <?php foreach ($estadoOptions as $opt): ?>
                <option value="<?= htmlspecialchars($opt, ENT_QUOTES, 'UTF-8') ?>" <?= (($old['estado'] ?? $contrato->getEstado()) === $opt) ? 'selected' : '' ?>>
                    <?= htmlspecialchars($opt, ENT_QUOTES, 'UTF-8') ?>
                </option>
            <?php endforeach; ?>
        </select>
        <?php if (!empty($errors['estado'])): ?>
            <div class="field-error"><?= htmlspecialchars($errors['estado'], ENT_QUOTES, 'UTF-8') ?></div>
        <?php endif; ?>
    </div>

    <button type="submit" class="btn btn-primary">Guardar cambios</button>
    &nbsp;
    <a class="btn" href="?route=contratos.index">Cancelar</a>
</form>

<?php require __DIR__ . '/../layouts/footer.php'; ?>