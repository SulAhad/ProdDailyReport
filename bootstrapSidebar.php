<button class="bodyBackground" style="border:none; margin:4px; font-size:24px;" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">☰ </button>
<div style="background:LightBlue; width:300px;" class="bodyBackground offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">ЕЖЕДНЕВНЫЙ МОНИТОРИНГ ПРОИЗВОДСТВА</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Закрыть"></button>
  </div>
  <hr>
  <div class="offcanvas-body">
    
    <ul class="nav flex-column mb-auto">

    <a href="index.php" class="nav-link text-dark">Главное меню</a>
    <a href="top5problem.php" class="nav-link text-dark">Топ 5 проблем</a>
    <a href="inspection.php" class="nav-link text-dark">Лист Обходов</a>
    
    <a class="form-select" style="text-decoration:none; border:none; margin:0 0 4px 0; cursor: pointer;"  data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Безопасность</a>
    <div class="collapse" id="collapseExample">
        <a href="Safety.php" class="nav-link text-dark" style="decoration:none; margin:0 0 0 5px; background:LightBlue;">Безопасность</a>
        <a href="statSafety.php" class="nav-link text-dark" style="decoration:none; margin:0 0 0 5px; background:LightBlue;">Статистика Безопасность</a>
        <a href="redactSafety.php" class="nav-link text-dark" style="decoration:none; margin:0 0 0 5px; background:LightBlue;">Редактировать лист Безопасности</a>
    </div>
    <a class="form-select" style="text-decoration:none; border:none; margin:0 0 4px 0; cursor: pointer;"  data-bs-toggle="collapse" data-bs-target="#collapseQuality" aria-expanded="false" aria-controls="collapseQuality">Качество</a>
    <div class="collapse" id="collapseQuality">
        <a href="quality.php" class="nav-link text-dark" style="decoration:none; margin:0 0 0 5px; background:LightBlue;">Качество</a>
        <a href="statQuality.php" class="nav-link text-dark" style="decoration:none; margin:0 0 0 5px; background:LightBlue;">Статистика Качество</a>
        <a href="redactQuality.php" class="nav-link text-dark" style="decoration:none; margin:0 0 0 5px; background:LightBlue;">Редактировать лист Качества</a>
    </div>
    <a class="form-select" style="text-decoration:none; border:none; margin:0 0 4px 0; cursor: pointer;"  data-bs-toggle="collapse" data-bs-target="#collapseTechnology" aria-expanded="false" aria-controls="collapseTechnology">Технология</a>
    <div class="collapse" id="collapseTechnology">
        <a href="technology.php" class="nav-link text-dark" style="decoration:none; margin:0 0 0 5px; background:LightBlue;">Технология</a>
        <a href="statTechnology.php" class="nav-link text-dark" style="decoration:none; margin:0 0 0 5px; background:LightBlue;">Статистика Технология</a>
        <a href="redactTechnology.php" class="nav-link text-dark" style="decoration:none; margin:0 0 0 5px; background:LightBlue;">Редактировать лист Texнологии</a>
    </div>
    <a class="form-select" style="text-decoration:none; border:none; margin:0 0 4px 0; cursor: pointer;"  data-bs-toggle="collapse" data-bs-target="#collapseProduction" aria-expanded="false" aria-controls="collapseProduction">Производство</a>
    <div class="collapse" id="collapseProduction">
        <a href="production.php" class="nav-link text-dark" style="decoration:none; margin:0 0 0 5px; background:LightBlue;">Производство</a>
        <a href="statProduction.php" class="nav-link text-dark" style="decoration:none; margin:0 0 0 5px; background:LightBlue;">Статистика Производство</a>
        <a href="redactProduction.php" class="nav-link text-dark" style="decoration:none; margin:0 0 0 5px; background:LightBlue;">Редактировать лист Производства</a>
    </div>
    <a class="form-select" style="text-decoration:none; border:none; margin:0 0 4px 0; cursor: pointer;" data-bs-toggle="collapse" data-bs-target="#collapseSirye" aria-expanded="false" aria-controls="collapseSirye">Сырьё</a>
    <div class="collapse" id="collapseSirye">
        <a href="sirye.php" class="nav-link text-dark" style="decoration:none; margin:0 0 0 5px; background:LightBlue;">Сырьё</a>
        <a href="redactSirye.php" class="nav-link text-dark" style="decoration:none; margin:0 0 0 5px; background:LightBlue;">Редактировать лист Сырья</a>
    </div>
    <a class="form-select" style="text-decoration:none; border:none; margin:0 0 4px 0; cursor: pointer;"  data-bs-toggle="collapse" data-bs-target="#collapse_active_water" aria-expanded="false" aria-controls="collapse_active_water">Активная вода</a>
    <div class="collapse" id="collapse_active_water">
        <a href="active_water.php" class="nav-link text-dark" style="decoration:none; background:LightBlue;">Активная вода</a>
        <a href="redact_active_water.php" class="nav-link text-dark" style="decoration:none; background:LightBlue;">Редактировать лист Активной воды</a>
    </div>
    
    <a href="support.php" class="nav-link text-dark">Для разработчика</a>

    
</ul>
    
    
  </div>
  <hr>
  <div class="dropdown" style="margin: 0 auto; margin-bottom:10px;">
    <a class="d-block link-body-emphasis text-decoration-none dropdown-toggle text-secondary" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="avatar.png" alt="mdo" width="32" height="32" class="rounded-circle"><small style="margin:2px;"><?php echo $a; ?></small>
    </a>
    <ul class="dropdown-menu text-small shadow dropdown-menu-end">
        <li><a class="dropdown-item disabled" href="#" >Новая заявка</a></li>
        <li><a class="dropdown-item disabled" href="#" >Настройки</a></li>
        <li><a class="dropdown-item disabled" href="#" >Профиль</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="logOut.php">Выйти</a></li>
    </ul>
</div>
  
</div>