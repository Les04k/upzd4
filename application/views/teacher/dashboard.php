<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h5>Панель преподавателя</h5>
            </div>
            <div class="card-body">
                <h5>Добро пожаловать, <?= $user->fio ?>!</h5>
                <p>Выберите действие в меню выше.</p>
                
                <div class="row mt-4">
                    <div class="col-md-3">
                        <div class="card bg-light">
                            <div class="card-body text-center">
                                <h6>Дисциплины</h6>
                                <p class="h4">📚</p>
                                <a href="<?= base_url('teacher/disciplines') ?>" class="btn btn-sm btn-primary">Перейти</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card bg-light">
                            <div class="card-body text-center">
                                <h6>Выставить оценку</h6>
                                <p class="h4">✏️</p>
                                <a href="<?= base_url('teacher/set_grade') ?>" class="btn btn-sm btn-primary">Перейти</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card bg-light">
                            <div class="card-body text-center">
                                <h6>Оценки студента</h6>
                                <p class="h4">👤</p>
                                <a href="<?= base_url('teacher/student_grades') ?>" class="btn btn-sm btn-primary">Перейти</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card bg-light">
                            <div class="card-body text-center">
                                <h6>Оценки группы</h6>
                                <p class="h4">👥</p>
                                <a href="<?= base_url('teacher/group_grades') ?>" class="btn btn-sm btn-primary">Перейти</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>