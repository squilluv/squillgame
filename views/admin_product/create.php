<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/admin/product">Управление играми</a></li>
                    <li class="active">Создать игру</li>
                </ol>
            </div>


            <h4>Добавить новую игру</h4>

            <br/>

            <?php if (isset($errors) && is_array($errors)): ?>
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li> - <?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>

            <div class="col-lg-12">
                <div class="login-form">
                    <form action="#" method="post" enctype="multipart/form-data">

                        <p>Названиe</p>
                        <input type="text" name="name" placeholder="" value="">

                        <p>Артикул</p>
                        <input type="text" name="code" placeholder="" value="">

                        <p>Стоимость</p>
                        <input type="text" name="price" placeholder="" value="">
                        <p>Стоимость СКИДКА</p><i class="fa fa-times red-text"></i>
                        <input type="text" name="price_sale" placeholder="" value="">

                        <p>Категория</p>
                        <select name="category_id">
                            <?php if (is_array($categoriesList)): ?>
                                <?php foreach ($categoriesList as $category): ?>
                                    <option value="<?php echo $category['id']; ?>">
                                        <?php echo $category['name']; ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>

                        <p>Teg</p>
                        <select name="teg_id">
                            <?php if (is_array($tegsList)): ?>
                                <?php foreach ($tegsList as $teg): ?>
                                    <option value="<?php echo $teg['id']; ?>">
                                        <?php echo $teg['name']; ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>

                        <p>Rec</p>
                        <select name="other_id">
                            <option value="0">
                                никуда
                            </option>
                            <?php if (is_array($recList)): ?>
                                <?php foreach ($recList as $rec): ?>
                                    <option value="<?php echo $rec['id']; ?>">
                                        <?php echo $rec['name']; ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>

                        <p>Series</p>
                        <select name="series_id">
                            <option value="0">
                                никуда
                            </option>
                            <?php if (is_array($seriesList)): ?>
                                <?php foreach ($seriesList as $series): ?>
                                    <option value="<?php echo $series['id']; ?>">
                                        <?php echo $series['name']; ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>

                         <p>Ссылка на серию если есть</p>
                        <textarea name="series"></textarea>

                        <br/><br/>

                        <p>разраб</p>
                        <input type="text" name="developer" placeholder="developer" value="">

                        <input type="text" name="publisher" placeholder="publisher" value="">

                        <input type="text" name="info" placeholder="info" value="">

                        <input type="date" name="date" placeholder="date" value="">

                        <input type="text" name="os_min" placeholder="os_min" value="">
                        <input type="text" name="cp_min" placeholder="cp_min" value="">
                        <input type="text" name="op_min" placeholder="op_min" value="">
                        <input type="text" name="vk_min" placeholder="vk_min" value="">
                        <input type="text" name="pd_min" placeholder="pd_min" value="">
                        <input type="text" name="os_max" placeholder="os_max" value="">
                        <input type="text" name="cp_max" placeholder="cp_max" value="">
                        <input type="text" name="op_max" placeholder="op_max" value="">
                        <input type="text" name="vk_max" placeholder="vk_max" value="">
                        <input type="text" name="pd_max" placeholder="pd_max" value="">

                        <p>Изображение игры</p>
                        <input type="file" name="image" placeholder="" value="">

                        <input type="file" name="imagerec" placeholder="" value="">

                        <p>Детальное описание</p>
                        <textarea name="description"></textarea>



                        <br/><br/>

                        <p>Наличие</p>
                        <select name="availability">
                            <option value="1" selected="selected">Да</option>
                            <option value="0">Нет</option>
                        </select>

                        <br/><br/>

                        <p>Новинка</p>
                        <select name="is_new">
                            <option value="1" selected="selected">Да</option>
                            <option value="0">Нет</option>
                        </select>

                       

                        <br/><br/>

                        <p>Рекомендуемые</p>
                        <select name="is_recommended">
                            <option value="1" selected="selected">Да</option>
                            <option value="0">Нет</option>
                        </select>
                        <p>SALE</p>
                        <select name="is_sale">
                            <option value="1" selected="selected">Да</option>
                            <option value="0">Нет</option>
                        </select>
                        <p>Pre-order</p>
                        <select name="is_pre">
                            <option value="1" selected="selected">Да</option>
                            <option value="0">Нет</option>
                        </select>

                        <br/><br/>

                        <p>Статус</p>
                        <select name="status">
                            <option value="1" selected="selected">Отображается</option>
                            <option value="0">Скрыт</option>
                        </select>

                        <br/><br/>

                        <input type="submit" name="submit" class="btn btn-default" value="Сохранить">

                        <br/><br/>

                    </form>
                </div>
            </div>

        </div>
    </div>
</section>

