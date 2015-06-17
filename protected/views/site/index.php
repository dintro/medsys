<?php
Yii::app()->clientScript->registerCoreScript('jquery'); //if you do not set yet
 $this->widget('ext.FlexPictureSlider.FlexPictureSlider',
  array(
    'imageBlockSelector' => '#myslider', //the jquery selector
    'widthSlider' => '500', //or you can use jquery '$(window).width()/1.6',
    'heightSlider' => '333', //or you can use jquery '$(window).height()/1.6',
    'slideUnitSize' => 'px', //px or %
    'timeBetweenChangeSlider' => 4000,
    //'slideRandomStart' => true, //only for version 1.0
    'timeDelayAnimation' => 1000, //the time before slider starts in miliseconds
    'sliderStartFrom' => 0, //if sliderSuffle is set false, only for version 1.1
    'sliderSuffle' => true, //suffle the pictures for random display, only for version 1.1
   )); 
   ?>
<center> <h1> <font color="navy" face="Impact"> Добро пожаловать на сайт поликлинического медицинского центра г. Чернигов </font> </h1> </center>
<center> <div id="myslider">
  <?php
  echo CHtml::image(Yii::app()->request->baseUrl . '/images/pl5.jpg');
  echo CHtml::image(Yii::app()->request->baseUrl . '/images/pl1.jpg');
  echo CHtml::image(Yii::app()->request->baseUrl . '/images/pl2.jpg');
  echo CHtml::image(Yii::app()->request->baseUrl . '/images/pl3.jpg');
  echo CHtml::image(Yii::app()->request->baseUrl . '/images/pl4.png');
  ?>
  </div> </center>
  <p/>
<center> <h5> Каждый человек время от времени нуждается в медицинской помощи. Возможно, мы не очень хотим об этом думать, но здоровье это не постоянная величина. Когда у нас, наших детей или родителей, родственников или друзей крепкое здоровье и они не болеют - нам хорошо. Если же со здоровьем возникают проблемы, нам очень важно найти врача или медицинское учреждение, которое поможет эффективно и безопасно преодолеть проблемы с адекватными затратами времени и средств. Часто нам нужен совет, как сохранить здоровье, и еще больше мы нуждаемся в профессиональной работе врачей в случае серьезной болезни.

Как выбрать врача или больницу? Как обрести уверенность в результате диагностики и лечения заболевания и обеспечить эффективную реабилитацию? Что делать в условиях, когда состояние государственной медицины не всегда соответствует нашим потребностям? Как сделать эффективными инвестиции в сохранение и восстановление здоровья? Как и кому, наконец, доверить собственное здоровье?

Ответы на эти вопросы, на наш взгляд, очевидны - обратиться за медицинской помощью в нашу клинику широкого профиля «Hippocrates». </h5> </center>