@extends('layouts/app')

@section('meta')
    <title>Улитайка - страхование для туристов</title>
@stop

@section('content')
    <div class="container">

        <div class="content-flex">
            <div class="block-flex-hh">
                <h1>США</h1>
                <hr class="hr-bottom">
            </div>
            <br>
            <div class="block-flex-1">
                <div class="block-flex-1-text">

                    <p>Соединенные штаты Америки—мечта номер один каждого туриста. Медицинские услуги в этой стране достигают колоссальных сумм, входя в пятерку самых дорогих в мире. Если Ваш выбор пал на США, не думайте и минуты о том, нужно ли оформлять медицинский полис. Тысячу раз да!</p>
                    <h3>Зачем нужна страховка в США?</h3>
                    <p>Это настолько разноплановая страна в сфере отдыха, что медицинский полис крайне необходим. Начиная от горных лыж и сноуборда, заканчивая серфингом, сплавами на каноэ и игрой в гольф, везде имеются риски попасть в непредвиденную ситуацию. Специальная страховка позволяет покрывать все расходы.</p>


                </div>
                <div class="block-flex-1-img">
                    <div class="block-img" style="padding-top: 0 !important;"><img src="{{asset('assets/img/usa_1.jpg')}}" alt=""></div>

                </div>
            </div>

            <div class="block-flex-2">
                <div class="block-flex-2-img">
                    <div class="block-img2">
                        <img src="{{asset('assets/img/usa_2.jpg')}}" alt="">
                    </div>
                </div>
                <div class="block-flex-2-text">
                    <p><b>Минимальное страхование с помощью полиса возмещает:</b></p>
                    <ul>
                        <li>Расходы на лечение</li>
                        <li>Расходы на переговоры со страховой компанией</li>
                        <li>Репатриация в случае смерти</li>
                        <li>Перевозку до больницы и клиники</li>
                    </ul>
                    <p>Медицинский полис должен иметь покрытие более 50 тысяч долларов. Такая сумма связана с тем, что медицина на американской земле на высочайшем уровне и требует за это много денег.</p>

                    <p><b>Опция “страховка от невыезда” поможет вернуть средства, если по некоторым обстоятельствам Вы не смогли поехать в путешествие.</b></p>
                    <ul>
                        <li>Неожиданная болезнь или травма</li>
                        <li>Отказ в выдаче визы или задержка в ее выдаче</li>
                        <li>Смерть застрахованного или его родственника</li>
                    </ul>
                </div>
            </div>
            <div class="block-flex-3">
                <div class="block-flex-3-text">

                    <p>Внимательно отнеситесь в оформлению медицинского полиса, чтобы он покрывал все возможные варианты.Детально изучите маршрут своего тура, проанализируйте все возможные риски, чтобы снизить вероятность возникновения страхового случая.</p>
                    <p><b>Интересные факты о США</b></p>
                    <ul>
                        <li>В любом заведении Вы можете потребовать стакан воды со льдом, которую предоставляется бесплатно.</li>
                        <li>Такси дорогостоящее и не популярно среди туристов.</li>
                        <li>Сигареты в Нью-Йорке стоят 11$ за пачку.</li>
                        <li>Чаевые будут ждать от Вас все кому не лень. В некоторых местах они уже включены в стоимость.</li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
@stop