<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h5>Добавить пользователя</h5>
            </div>
            <div class="card-body">
                <form method="post">
                    <div class="mb-3">
                        <label class="form-label">ФИО</label>
                        <input type="text" name="fio" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Логин</label>
                        <input type="text" name="login" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Пароль</label>
                        <input type="password" name="pass" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Роль</label>
                        <select name="role" class="form-control" required>
                            <option value="">Выберите</option>
                            <option value="1">Администратор</option>
                            <option value="2">Преподаватель</option>
                            <option value="3">Студент</option>
                        </select>
                    </div>
                    <button type="submit" name="save" class="btn btn-success">Сохранить</button>
                    <a href="<?= base_url('admin/users') ?>" class="btn btn-secondary">Назад</a>
                </form>
            </div>
        </div>
    </div>
</div>