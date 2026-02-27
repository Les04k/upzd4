<div class="card">
    <div class="card-header bg-danger text-white d-flex justify-content-between align-items-center">
        <h5>Корзина (удаленные записи)</h5>
        <a href="<?= base_url('admin') ?>" class="btn btn-sm btn-light">Назад</a>
    </div>
    <div class="card-body">
        
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="users-tab" data-bs-toggle="tab" data-bs-target="#users" type="button">Пользователи (<?= count($deleted_users) ?>)</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="groups-tab" data-bs-toggle="tab" data-bs-target="#groups" type="button">Группы (<?= count($deleted_groups) ?>)</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="disc-tab" data-bs-toggle="tab" data-bs-target="#disc" type="button">Дисциплины (<?= count($deleted_disc) ?>)</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="grades-tab" data-bs-toggle="tab" data-bs-target="#grades" type="button">Оценки (<?= count($deleted_grades) ?>)</button>
            </li>
        </ul>
        
        <div class="tab-content mt-3" id="myTabContent">
            
            <!-- Удаленные пользователи -->
            <div class="tab-pane fade show active" id="users" role="tabpanel">
                <?php if (empty($deleted_users)): ?>
                    <p class="text-muted">Корзина пользователей пуста</p>
                <?php else: ?>
                    <table class="table table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th>ID</th>
                                <th>ФИО</th>
                                <th>Логин</th>
                                <th>Роль</th>
                                <th>Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($deleted_users as $u): ?>
                            <tr>
                                <td><?= $u->id_u ?></td>
                                <td><?= $u->fio ?></td>
                                <td><?= $u->login ?></td>
                                <td><?= $u->role_name ?></td>
                                <td>
                                    <a href="<?= base_url('admin/restore_user/'.$u->id_u) ?>" class="btn btn-sm btn-success" onclick="return confirm('Восстановить пользователя?')">↩ Восстановить</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endif; ?>
            </div>
            
            <!-- Удаленные группы -->
            <div class="tab-pane fade" id="groups" role="tabpanel">
                <?php if (empty($deleted_groups)): ?>
                    <p class="text-muted">Корзина групп пуста</p>
                <?php else: ?>
                    <table class="table table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th>Название группы</th>
                                <th>Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($deleted_groups as $g): ?>
                            <tr>
                                <td><?= $g->title ?></td>
                                <td>
                                    <a href="<?= base_url('admin/restore_group/'.$g->title) ?>" class="btn btn-sm btn-success">↩ Восстановить</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endif; ?>
            </div>
            
            <!-- Удаленные дисциплины -->
            <div class="tab-pane fade" id="disc" role="tabpanel">
                <?php if (empty($deleted_disc)): ?>
                    <p class="text-muted">Корзина дисциплин пуста</p>
                <?php else: ?>
                    <table class="table table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th>Название</th>
                                <th>Описание</th>
                                <th>Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($deleted_disc as $d): ?>
                            <tr>
                                <td><?= $d->title ?></td>
                                <td><?= $d->descript ?></td>
                                <td>
                                    <a href="<?= base_url('admin/restore_disc/'.$d->id_d) ?>" class="btn btn-sm btn-success">↩ Восстановить</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endif; ?>
            </div>
            
            <!-- Удаленные оценки -->
            <div class="tab-pane fade" id="grades" role="tabpanel">
                <?php if (empty($deleted_grades)): ?>
                    <p class="text-muted">Корзина оценок пуста</p>
                <?php else: ?>
                    <table class="table table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th>Студент</th>
                                <th>Дисциплина</th>
                                <th>Оценка</th>
                                <th>Дата</th>
                                <th>Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($deleted_grades as $g): ?>
                            <tr>
                                <td><?= $g->fio ?></td>
                                <td><?= $g->disc_name ?></td>
                                <td><?= $g->ocenka ?></td>
                                <td><?= date('d.m.Y', strtotime($g->date)) ?></td>
                                <td>
                                    <a href="<?= base_url('admin/restore_grade/'.$g->id_oc) ?>" class="btn btn-sm btn-success">↩ Восстановить</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>