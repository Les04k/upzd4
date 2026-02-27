<div class="row">
    <div class="col-md-5">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h5>Выбрать студента и дисциплину</h5>
            </div>
            <div class="card-body">
                <form method="get">
                    <div class="mb-3">
                        <label class="form-label">Студент</label>
                        <select name="student" class="form-control" required>
                            <option value="">Выберите</option>
                            <?php foreach ($students as $s): ?>
                                <option value="<?= $s->id_u ?>" <?= $this->input->get('student') == $s->id_u ? 'selected' : '' ?>>
                                    <?= $s->fio ?>
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
                    <button type="submit" class="btn btn-primary">Выбрать</button>
                </form>
            </div>
        </div>
    </div>
    
    <?php if (isset($exist) || $this->input->get('student')): ?>
    <div class="col-md-7">
        <div class="card">
            <div class="card-header bg-success text-white">
                <h5>Выставление оценки</h5>
            </div>
            <div class="card-body">
                <?php if ($this->session->flashdata('msg')): ?>
                    <div class="alert alert-success"><?= $this->session->flashdata('msg') ?></div>
                <?php endif; ?>
                
                <form method="post">
                    <input type="hidden" name="student" value="<?= $this->input->get('student') ?>">
                    <input type="hidden" name="disc" value="<?= $this->input->get('disc') ?>">
                    
                    <div class="mb-3">
                        <label class="form-label">Оценка (1-5)</label>
                        <input type="number" name="ocenka" min="1" max="5" class="form-control" 
                               value="<?= isset($exist) ? $exist->ocenka : '' ?>">
                        <small class="text-muted">Оставьте пустым, чтобы удалить оценку</small>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Комментарий</label>
                        <textarea name="comment" class="form-control"><?= isset($exist) ? $exist->comment : '' ?></textarea>
                    </div>
                    
                    <button type="submit" name="save" class="btn btn-success">Сохранить</button>
                    <a href="<?= base_url('teacher/set_grade') ?>" class="btn btn-secondary">Сбросить</a>
                </form>
            </div>
        </div>
    </div>
    <?php endif; ?>
</div>