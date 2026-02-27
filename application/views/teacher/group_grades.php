<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h5>Выбрать группу и дисциплину</h5>
            </div>
            <div class="card-body">
                <form method="get">
                    <div class="mb-3">
                        <label class="form-label">Группа</label>
                        <select name="group" class="form-control" required>
                            <option value="">Выберите</option>
                            <?php foreach ($groups as $g): ?>
                                <option value="<?= $g->title ?>" <?= $this->input->get('group') == $g->title ? 'selected' : '' ?>>
                                    <?= $g->title ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Дисциплина</label>
                        <select name="disc" class="form-control" required>
                            <option value="">Выберите</option>
                            <?php foreach ($disc as $d): ?>
                                <option value="<?= $d->id_d ?>" <?= $this->input->get('disc') == $d->id_d ? 'selected' : '' ?>>
                                    <?= $d->title ?>
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
                <h5>Оценки группы <?= $this->input->get('group') ?></h5>
            </div>
            <div class="card-body">
                <?php if (empty($grades)): ?>
                    <p class="text-muted">Нет оценок</p>
                <?php else: ?>
                    <table class="table table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th>Студент</th>
                                <th>Оценка</th>
                                <th>Дата</th>
                                <th>Комментарий</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($grades as $g): ?>
                            <tr>
                                <td><?= $g->fio ?></td>
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