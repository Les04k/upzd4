<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Система оценок</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/custom.css">
    <style>
        .logout-btn {
            margin-left: 10px;
        }
    </style>
</head>
<body class="bg-light">

<?php if ($this->session->userdata('logged')): ?>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
    <div class="container">
        <a class="navbar-brand" href="#">📚 Студенческие оценки</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <?php if ($this->session->userdata('role') == 'admin'): ?>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('admin') ?>">Главная</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('admin/users') ?>">Пользователи</a></li>
                <?php endif; ?>
                
      <?php if ($this->session->userdata('role') == 'teacher'): ?>
    <li class="nav-item"><a class="nav-link" href="<?= base_url('teacher') ?>">Главная</a></li>
    <li class="nav-item"><a class="nav-link" href="<?= base_url('teacher/disciplines') ?>">Дисциплины</a></li>
    <li class="nav-item"><a class="nav-link" href="<?= base_url('teacher/set_grade') ?>">Выставить оценку</a></li>
    <li class="nav-item"><a class="nav-link" href="<?= base_url('teacher/student_grades') ?>">Оценки студента</a></li>
    <li class="nav-item"><a class="nav-link" href="<?= base_url('teacher/group_grades') ?>">Оценки группы</a></li>
    <li class="nav-item"><a class="nav-link" href="<?= base_url('teacher/charts') ?>">Графики</a></li>
<?php endif; ?>
                
                <?php if ($this->session->userdata('role') == 'student'): ?>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('student') ?>">Мои оценки</a></li>
                <?php endif; ?>
            </ul>
            
            <ul class="navbar-nav">
                <li class="nav-item">
                    <span class="nav-link text-white">
                        👤 <?= $this->session->userdata('fio') ?> (<?= $this->session->userdata('role') ?>)
                    </span>
                </li>
                <li class="nav-item">
                    <a class="btn btn-light btn-sm logout-btn" href="<?= base_url('auth/logout') ?>">🚪 Выйти</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<?php endif; ?>

<div class="container">