<div class="row justify-content-center mt-5">
    <div class="col-md-4">
        <div class="card shadow">
            <div class="card-header bg-primary text-white text-center">
                <h4>Вход в систему</h4>
            </div>
            <div class="card-body">
                <?php if ($this->session->flashdata('error')): ?>
                    <div class="alert alert-danger"><?= $this->session->flashdata('error') ?></div>
                <?php endif; ?>
                
                <form method="post" action="<?= base_url('auth/do_login') ?>">
                    <div class="mb-3">
                        <label class="form-label">Логин</label>
                        <input type="text" name="login" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Пароль</label>
                        <input type="password" name="pass" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Войти</button>
                </form>
                
                <div class="mt-3 text-muted small">
                    <p><strong>Тестовые аккаунты:</strong><br>
                    Преподаватель: ivanov / 123456<br>
                    Студент: sidorov / 123456<br>
                    Админ: admin / 123456</p>
                </div>
            </div>
        </div>
    </div>
</div>