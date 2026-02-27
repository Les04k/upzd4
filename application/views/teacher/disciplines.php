<div class="card">
    <div class="card-header bg-primary text-white">
        <h5>Мои дисциплины</h5>
    </div>
    <div class="card-body">
        <?php if (empty($disc)): ?>
            <p class="text-muted">Нет дисциплин</p>
        <?php else: ?>
            <table class="table table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>Название</th>
                        <th>Описание</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($disc as $d): ?>
                    <tr>
                        <td><?= $d->title ?></td>
                        <td><?= $d->descript ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</div>