<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h5>Панель администратора</h5>
            </div>
            <div class="card-body">
                <h5>Добро пожаловать, <?= $user->fio ?>!</h5>
                
                <div class="row mt-4">
                    <div class="col-md-3 mb-3">
                        <div class="card text-white bg-primary">
                            <div class="card-body text-center">
                                <h6>Преподаватели</h6>
                                <h3><?= $teachers_count ?></h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="card text-white bg-success">
                            <div class="card-body text-center">
                                <h6>Студенты</h6>
                                <h3><?= $students_count ?></h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="card text-white bg-warning">
                            <div class="card-body text-center">
                                <h6>Группы</h6>
                                <h3><?= $groups_count ?></h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="card text-white bg-info">
                            <div class="card-body text-center">
                                <h6>Дисциплины</h6>
                                <h3><?= $disc_count ?></h3>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Статистика удаленных записей -->
                <div class="row mt-2">
                    <div class="col-md-12">
                        <div class="card bg-light">
                            <div class="card-header bg-secondary text-white">
                                <h6>Корзина (удаленные записи)</h6>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="alert alert-danger text-center">
                                            <strong>Пользователей:</strong> <?= $deleted_users ?>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="alert alert-danger text-center">
                                            <strong>Групп:</strong> <?= $deleted_groups ?>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="alert alert-danger text-center">
                                            <strong>Дисциплин:</strong> <?= $deleted_disc ?>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="alert alert-danger text-center">
                                            <strong>Оценок:</strong> <?= $deleted_grades ?>
                                        </div>
                                    </div>
                                </div>
                                <a href="<?= base_url('admin/trash') ?>" class="btn btn-danger">Перейти в корзину</a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row mt-3">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                Управление
                            </div>
                            <div class="card-body">
                                <a href="<?= base_url('admin/users') ?>" class="btn btn-primary w-100 mb-2">Список пользователей</a>
                                <a href="<?= base_url('admin/add_user') ?>" class="btn btn-success w-100">Добавить пользователя</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>