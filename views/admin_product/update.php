<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/admin/product">Управление играми</a></li>
                    <li class="active">Редактировать игру</li>
                </ol>
            </div>


            <h4>Редактировать игру #<?php echo $id; ?></h4>

            <br/>

            <div class="col-lg-12">
                <div class="login-form">
                    <form action="#" method="post" enctype="multipart/form-data">

                        <p>Название</p>
                        <input type="text" name="name" placeholder="" value="<?php echo $product['name']; ?>">

                        <p>Артикул</p>
                        <input type="text" name="code" placeholder="" value="<?php echo $product['code']; ?>">

                        <p>Стоимость</p>
                        <input type="text" name="price" placeholder="" value="<?php echo $product['price']; ?>">
                         <p>Стоимость СТАРАЯ </p><i class="fa fa-times red-text"></i>
                        <input type="text" name="price_sale" placeholder="" value="<?php echo $product['price_sale']; ?>">

                        <p>Категория</p>
                        <select name="category_id">
                            <?php if (is_array($categoriesList)): ?>
                                <?php foreach ($categoriesList as $category): ?>
                                    <option value="<?php echo $category['id']; ?>" 
                                        <?php if ($product['category_id'] == $category['id']) echo ' selected="selected"'; ?>>
                                        <?php echo $category['name']; ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>


                        
                        <br/><br/>

                        <p>tegID</p>
                        <select name="teg_id">
                            <?php if (is_array($tegsList)): ?>
                                <?php foreach ($tegsList as $teg): ?>
                                    <option value="<?php echo $teg['id']; ?>" 
                                        <?php if ($product['teg_id'] == $teg['id']) echo ' selected="selected"'; ?>>
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

                        <br><br>

                        <p>Ссылка на серию если есть</p>
                        <textarea name="series"><?php echo $product['series']; ?></textarea>
                        
                        <br/><br/>

                        <input type="date" name="date" placeholder="date" value="<?php echo $product['date']; ?>">

                        <p>разраб</p>
                        <input type="text" name="developer" placeholder="" value="<?php echo $product['developer']; ?>">
                        <input type="text" name="publisher" placeholder="publisher" value="<?php echo $product['publisher']; ?>">

                        <input type="text" name="os_min" placeholder="os_min" value="<?php echo $product['os_min']; ?>">
                        <input type="text" name="cp_min" placeholder="cp_min" value="<?php echo $product['cp_min']; ?>">
                        <input type="text" name="op_min" placeholder="op_min" value="<?php echo $product['op_min']; ?>">
                        <input type="text" name="vk_min" placeholder="vk_min" value="<?php echo $product['vk_min']; ?>">
                        <input type="text" name="pd_min" placeholder="pd_min" value="<?php echo $product['pd_min']; ?>">
                        <input type="text" name="os_max" placeholder="os_max" value="<?php echo $product['os_max']; ?>">
                        <input type="text" name="cp_max" placeholder="cp_max" value="<?php echo $product['cp_max']; ?>">
                        <input type="text" name="op_max" placeholder="op_max" value="<?php echo $product['op_max']; ?>">
                        <input type="text" name="vk_max" placeholder="vk_max" value="<?php echo $product['vk_max']; ?>">
                        <input type="text" name="pd_max" placeholder="pd_max" value="<?php echo $product['pd_max']; ?>">

                        <p>Изображение</p>
                        <img src="<?php echo Product::getImage($product['id']); ?>" width="200" alt="" />
                        <input type="file" name="image" placeholder="" value="<?php echo $product['image']; ?>">

                        <p>Изображение rec</p>
                        <img src="<?php echo Product::getImageRec($RecProduct['id']); ?>" width="200" alt="" />
                        <input type="file" name="imagerec" placeholder="" value="<?php echo $product['imagerec']; ?>">

                        <p>Детальное описание</p>
                        <textarea name="description"><?php echo $product['description']; ?></textarea>
                        
                        <br/><br/>

                        <p>teg</p>
                        <select name="info">
                            <option value="3" <?php if ($product['info'] == 3) echo ' selected="selected"'; ?>>Онлайн игра</option>
                            <option value="2" <?php if ($product['info'] == 2) echo ' selected="selected"'; ?>>Кооперативная игра</option>
                            <option value="1" <?php if ($product['info'] == 1) echo ' selected="selected"'; ?>>Одиночная игра</option>
                            <option value="0" <?php if ($product['info'] == 0) echo ' selected="selected"'; ?>></option>
                        </select>
                        
                        <br/><br/>
                        
                        <p>Новинка</p>
                        <select name="is_new">
                            <option value="1" <?php if ($product['is_new'] == 1) echo ' selected="selected"'; ?>>Да</option>
                            <option value="0" <?php if ($product['is_new'] == 0) echo ' selected="selected"'; ?>>Нет</option>
                        </select>
                        
                        <br/><br/>

                        <p>Рекомендуемые</p>
                        <select name="is_recommended">
                            <option value="1" <?php if ($product['is_recommended'] == 1) echo ' selected="selected"'; ?>>Да</option>
                            <option value="0" <?php if ($product['is_recommended'] == 0) echo ' selected="selected"'; ?>>Нет</option>
                        </select>

                        <br><br>

                        <p>Скидка</p>
                        <select name="is_sale">
                            <option value="1" <?php if ($product['is_sale'] == 1) echo ' selected="selected"'; ?>>Да</option>
                            <option value="0" <?php if ($product['is_sale'] == 0) echo ' selected="selected"'; ?>>Нет</option>
                        </select>
                        <p>Предзаказ</p>
                        <select name="is_pre">
                            <option value="1" <?php if ($product['is_pre'] == 1) echo ' selected="selected"'; ?>>Да</option>
                            <option value="0" <?php if ($product['is_pre'] == 0) echo ' selected="selected"'; ?>>Нет</option>
                        </select>
                        
                        <br/><br/>

                        <p>Статус</p>
                        <select name="status">
                            <option value="1" <?php if ($product['status'] == 1) echo ' selected="selected"'; ?>>Отображается</option>
                            <option value="0" <?php if ($product['status'] == 0) echo ' selected="selected"'; ?>>Скрыт</option>
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
