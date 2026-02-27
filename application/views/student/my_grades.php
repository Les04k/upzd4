<div class="card">
    <div class="card-header bg-primary text-white">
        <h5>Мои оценки, <?= $fio ?></h5>
    </div>
    <div class="card-body">
        <?php if (empty($grades)): ?>
            <div class="alert alert-info">У вас пока нет оценок</div>
        <?php else: ?>
            <table class="table table-bordered table-striped">
                <thead class="table-light">
                    <tr>
                        <th>Дисциплина</th>
                        <th>Оценка</th>
                        <th>Дата</th>
                        <th>Комментарий</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($grades as $g): ?>
                    <tr>
                        <td><?= $g->disc_name ?></td>
                        <td>
                            <span class="badge fs-6 bg-<?= $g->ocenka >= 4 ? 'success' : ($g->ocenka == 3 ? 'warning' : 'danger') ?>">
                                <?= $g->ocenka ?>
                            </span>
                        </td>
                        <td><?= date('d.m.Y', strtotime($g->date)) ?></td>
                        <td><?= $g->comment ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</div>