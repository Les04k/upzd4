<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h5>Выбрать студента</h5>
            </div>
            <div class="card-body">
                <form method="get">
                    <div class="mb-3">
                        <select name="student" class="form-control" required>
                            <option value="">Выберите студента</option>
                            <?php foreach ($students as $s): ?>
                                <option value="<?= $s->id_u ?>" <?= $this->input->get('student') == $s->id_u ? 'selected' : '' ?>>
                                    <?= $s->fio ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Показать</button>
                </form>
            </div>
        </div>
    </div>
    
    <?php if (isset($grades)): ?>
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-success text-white">
                <h5>Оценки студента: <?= isset($sinfo) ? $sinfo->fio : '' ?></h5>
            </div>
            <div class="card-body">
                <?php if (empty($grades)): ?>
                    <p class="text-muted">Нет оценок</p>
                <?php else: ?>
                    <table class="table table-bordered">
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
                                <td><span class="badge bg-<?= $g->ocenka >= 4 ? 'success' : ($g->ocenka == 3 ? 'warning' : 'danger') ?>"><?= $g->ocenka ?></span></td>
                                <td><?= date('d.m.Y', strtotime($g->date)) ?></td>
                                <td><?= $g->comment ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php endif; ?>
</div>