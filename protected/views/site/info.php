<center> <h1> Наши контакты </h1> </center>

<br />

<h4>
<b> Адрес клиники: </b>
<p> г. Чернигов, Деснянский район, ул. Пр. Мира 12345.</p>
</h4>

<h4>
<b> Контактные телефоны: </b>
<p> (0462)123-456; (0462)789-098; (04622)5-37-99 </p>
</h4>

<h4>
<b> Режим работы: </b>
<p> <font color="red"> Пн-Пт: </font> 9:00-18:00 :::
<font color="red"> Сб: </font> 9:00-15:00 :::
<font color="red"> Вс: </font> Выходной
</p>
</h4>

<h4>
<b> Наша электронная почта: </b>
<p> <a href="URL"> poliklinikagippokrat@gmail.com </a> </p>
</h4>

<h4>
<b> Skype: </b>
<p> poliklinikagippokrat </p>
</h4>

<h4> <b> Наше месторасположение: </b> </h4>

<?php
$this->widget('ext.yii-google-map-widget-master.GoogleMap',
array
(
'markers' => array
   (
   array
      (
      'lat' => $latitude,
      'lng' => $longitude,
      'draggable'=>false,
      'title'=>'Это заголовок маркера',
      ),
   ),
'params' => array
   (
   'visible'=>true,
   'zoom'=>13,
   'width'=>'100%',
   'height'=>'425px',
   ),
)
);
?>