var i, tempArray, tempObj, tempDate;

$(document).ready(function () {
    console.log ('Edit JS Start');

    // календарь  min Date
    $('#dateFrom').datepicker({
        minDate: new Date(),
        dateFormat: 'dd.mm.yyyy',
        keyboardNav: 'false',
        //autoClose: 'true',
        onSelect: function (fd, date, inst) {
            if (document.querySelector('#dateFrom').value != '') {
                $('#dateFrom').datepicker().data('datepicker').hide();
                //if (document.querySelector('#dateFrom').value > document.querySelector('#dateTill').value)  $('#dateTill').datepicker().data('datepicker').clear();
                //если последняя дата установленна раньше первой, удаляем ее
                tempArray = document.querySelector('#dateFrom').value.split('.');
                tempFrom = new Date(tempArray[2], tempArray[1] - 1, tempArray[0]);
                if (document.querySelector('#dateTill').value) {
                    tempObj = document.querySelector('#dateTill').value.split('.');
                    tempTill = new Date(tempObj[2], tempObj[1] - 1, tempObj[0]);
                    if (tempFrom - tempTill > 0) {
                        $('#dateTill').datepicker().data('datepicker').clear();
                    }
                }
                $('#dateTill').datepicker().data('datepicker').update('minDate', tempFrom);
                $('#dateTill').datepicker().data('datepicker').show();
                $('#dateFrom').trigger('change');
            }
        },
        onShow: function () {
            $('#dateTill').datepicker().data('datepicker').hide();
        },
        onHide: function (dp, animationCompleted) {
            if (document.querySelector('#dateFrom').value == '' && document.querySelectorAll('#dateFrom.auto-correct').length > 0) {
                $('#dateFrom').datepicker().data('datepicker').selectDate(new Date());

            }
        }
    });

    $('#dateTill').datepicker({
        minDate: new Date(),
        dateFormat: 'dd.mm.yyyy',
        //autoClose: true,
        onSelect: function (fd, date, inst) {
            if (document.querySelector('#dateTill').value != '') {
                $('#dateTill').datepicker().data('datepicker').hide();
            }
            $('#dateTill').trigger('change');
            //console.log ('Date from selected');
        },
        onHide: function (fd, date, inst) {
            //если пользователь не выбрал дату окончания, берется на месяц вперед
            if (document.querySelector('#dateTill').value == '' && document.querySelectorAll('#dateTill.auto-correct').length > 0) {
                if (document.querySelector('#dateFrom').value != '') {
                    tempDate = new Date(document.querySelector('#dateFrom').value);
                } else {
                    tempDate = new Date();
                    tempDate.setMonth(tempDate.getMonth() + 1);
                }

                $('#dateTill').datepicker().data('datepicker').selectDate(tempDate);
            }
        }
    });

    tempArray = [];

    $.getJSON('/js/json/country.json', function (data) {
        $.each(data, function(key, val) {
            tempArray.push({countryName: key,
                countryViewName: val
            });
        });

        var myMs = $('#mainCountries').magicSuggest({
            data: tempArray,
            placeholder: 'Страна поездки',
            valueField: 'countryName',
            displayField: 'countryViewName',
            maxSelection: 10,
            expandOnFocus: true,
            hideTrigger: true
        });
    });

    // выпадающий список путешественников
    $('.box-2').click(function () {
        $(this).next().toggle();
        $('.human-drop').mouseleave(function () {
            $(this).hide();
        });
    });

    //отзывы
    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        navText: ["", ""],
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                nav: false
            },
            400: {
                items: 1,
                nav: false
            },
            600: {
                items: 1,
                nav: false
            },
            1000: {
                items: 1,
                nav: true,
                loop: true
            }
        }
    });

    //Появляющиеся блоки (входит в страховку, дополнительно, дополнительные опции)
    $('#toggle_insurance').click(function () {
        $(this).next().toggle('slow');
        return false;
    });

    $('#toggle_additional').click(function () {
        $(this).next().toggle('slow');
        return false;
    });

    $('#toggle_options').click(function () {
        $(this).next().toggle('slow');
        return false;
    });

    /* Евро и доллар (Медицинское страхование) */

    function make_dollar() {
        if ($("#radio_usd").is(":checked")) {
            $(".currency_symbol").html("$");
        } else {
            console.log("ne rabotaet");
        }
    }

    function make_euro() {
        if ($("#radio_euro").is(":checked")) {
            $(".currency_symbol").html("&#8364;");
        } else {
            console.log("ne rabotaet");
        }
    }

    var radiobuttonDollar = document.getElementById("radio_usd");
    if(radiobuttonDollar){
        radiobuttonDollar.addEventListener("click", make_dollar, false);
    }

    var radiobuttonEuro = document.getElementById("radio_euro");
    if(radiobuttonEuro){
        radiobuttonEuro.addEventListener("click", make_euro, false);
    }


});

// переключение количества путешественников
function conditions(boxId) {
    tempObj = $('#tr_check_' + boxId)[0];
    if (tempObj.checked) {
        $('#tr' + boxId).show();
        console.log ('Блок показан');
    } else {
        $('#tr' + boxId).hide();
        console.log ('Блок спрятан');
    }

}

//обработка массива country.json и выбор заданных стран
function countryParseWithSelect(view, defData, csrfToken) {

    var tempArr = [];

    $.getJSON('/js/json/country.json', function (data) {
        $.each(data, function(key, val) {
            tempArr.push({countryName: key,
                countryViewName: val
            });
        });

        var myMs = $('#msCountries').magicSuggest({
            data: tempArr,
            placeholder: 'Выберите страну',
            valueField: 'countryName',
            displayField: 'countryViewName',
            maxSelection: 10,
            expandOnFocus: true,
            hideTrigger: true
        });

        if ('countries' in defData) {
            tempArr = [];
            //console.log (defData['countries']);
            for (key in defData['countries']) {
                tempArr.push(defData['countries'][key]['country_name']);
            }
            myMs.setValue(tempArr);
        } else {
            console.log ('Страна не выбрана');
        }

        switch (view) {
            case 'calc':
                $(myMs).on('selectionchange', function(e,m){
                    chRequest('/calcajax', csrfToken);
                });
                break;
            case 'details':
                $(myMs).on('selectionchange', function(e,m){
                    chDetails('/calcajax', csrfToken);
                });
                break;

        }
    });

    $.getJSON('/js/json/sportActiveMain.json', function (data) {
        tempArr = [];
        $.each(data, function(key, val) {
            tempArr.push({sportName: key,
                sportViewName: val
            });
        });

        if ('additionalConditions' in defData && defData['additionalConditions'][0]['accept'] == 'true') tempVar = false
        else tempVar = true;

        myMs = $('#msActiveMain').magicSuggest({
            data: tempArr,
            placeholder: 'Распространенные виды спорта',
            valueField: 'sportName',
            displayField: 'sportViewName',
            maxSelection: 10,
            expandOnFocus: true,
            hideTrigger: true,
            disabled: tempVar
        });

        if ('activeMain' in defData) myMs.setValue(defData['activeMain']);

        switch (view) {
            case 'calc':
                $(myMs).on('selectionchange', function(e,m){
                    chRequest('/calcajax', csrfToken);
                });
                break;
            case 'details':
                $(myMs).on('selectionchange', function(e,m){
                    chDetails('/calcajax', csrfToken);
                });
                break;

        }
    });

    $.getJSON('/js/json/sportActiveOther.json', function (data) {
        tempArr = [];
        $.each(data, function(key, val) {
            tempArr.push({sportName: key,
                sportViewName: val
            });
        });

        if ('additionalConditions' in defData && defData['additionalConditions'][0]['accept'] == 'true') tempVar = false
        else tempVar = true;

        myMs = $('#msActiveOther').magicSuggest({
            data: tempArr,
            placeholder: 'Другие виды спорта',
            valueField: 'sportName',
            displayField: 'sportViewName',
            maxSelection: 10,
            expandOnFocus: true,
            hideTrigger: true,
            disabled: tempVar
        });
        if ('activeOther' in defData) myMs.setValue(defData['activeOther']);

        switch (view) {
            case 'calc':
                $(myMs).on('selectionchange', function(e,m){
                    chRequest('/calcajax', csrfToken);
                });
                break;
            case 'details':
                $(myMs).on('selectionchange', function(e,m){
                    chDetails('/calcajax', csrfToken);
                });
                break;

        }
    });

    $.getJSON('/js/json/sportActiveMain.json', function (data) {
        tempArr = [];
        $.each(data, function(key, val) {
            tempArr.push({sportName: key,
                sportViewName: val
            });
        });

        if ('additionalConditions' in defData && defData['additionalConditions'][1]['accept'] == 'true') tempVar = false
        else tempVar = true;

        myMs = $('#msProfiMain').magicSuggest({
            data: tempArr,
            placeholder: 'Распространенные виды спорта',
            valueField: 'sportName',
            displayField: 'sportViewName',
            maxSelection: 10,
            expandOnFocus: true,
            hideTrigger: true,
            disabled: tempVar
        });
        if ('profiMain' in defData) myMs.setValue(defData['profiMain']);

        switch (view) {
            case 'calc':
                $(myMs).on('selectionchange', function(e,m){
                    chRequest('/calcajax', csrfToken);
                });
                break;
            case 'details':
                $(myMs).on('selectionchange', function(e,m){
                    chDetails('/calcajax', csrfToken);
                });
                break;

        }
    });

    $.getJSON('/js/json/sportActiveOther.json', function (data) {
        tempArr = [];
        $.each(data, function(key, val) {
            tempArr.push({sportName: key,
                sportViewName: val
            });
        });

        if ('additionalConditions' in defData && defData['additionalConditions'][1]['accept'] == 'true') tempVar = false
        else tempVar = true;

        myMs = $('#msProfiOther').magicSuggest({
            data: tempArr,
            placeholder: 'Другие виды спорта',
            valueField: 'sportName',
            displayField: 'sportViewName',
            maxSelection: 10,
            expandOnFocus: true,
            hideTrigger: true,
            disabled: tempVar
        });
        if ('profiOther' in defData) myMs.setValue(defData['profiOther']);

        switch (view) {
            case 'calc':
                $(myMs).on('selectionchange', function(e,m){
                    chRequest('/calcajax', csrfToken);
                });
                break;
            case 'details':
                $(myMs).on('selectionchange', function(e,m){
                    chDetails('/calcajax', csrfToken);
                });
                break;

        }
    });

    //console.log('Country with value parse');
}

// Вносим в страховку данные, введенные в форму на главной странице
const setDetailsDefaultData = (defaultData, csrf) => {

    defaultData = JSON.parse(defaultData);
    //var tempVar;

    //сохранить id полиса что бы в дальнейшем не высчитывать его заново, а работать уже с этим полисом
    console.log ('У компании ' + defaultData['company_id'] + ' полис номер ' + defaultData['id']);
    document.querySelector('#policeId').value = defaultData['id'];

    //сначала выделим страны, выбранные в начальной форме
    countryParseWithSelect('details', defaultData, csrf);

    //потом даты поездки
    var myDatepicker = $('#dateFrom').datepicker().data('datepicker');
    if (defaultData['policy_period_from'] == null || defaultData['policy_period_from'] == '') document.querySelector('#dateFrom').setAttribute('placeholder', 'Туда')
    else {
        tempArray = defaultData['policy_period_from'].split('.');
        tempFrom = new Date(tempArray[2], tempArray[1]-1, tempArray[0]);
        myDatepicker.selectDate(tempFrom);
    }

    myDatepicker = $('#dateTill').datepicker().data('datepicker');
    if (defaultData['policy_period_till'] == null || defaultData['policy_period_till'] == '') document.querySelector('#dateTill').setAttribute('placeholder', 'Обратно')
    else {
        tempArray = defaultData['policy_period_till'].split('.');
        tempTill = new Date(tempArray[2], tempArray[1]-1, tempArray[0]);
        myDatepicker.selectDate(tempTill);
    }

    //данные страхователя
    if (defaultData['client_first_name']) document.querySelector('#insurederFirstName').value = defaultData['client_first_name'];
    if (defaultData['client_last_name']) document.querySelector('#insurederLastName').value = defaultData['client_last_name'];
    //подготовим окно выбора даты рождения страхователя
    if (defaultData['client_birthdate']) {
        tempVar = new Date(defaultData['client_birthdate']);
    } else {
        tempVar = new Date();
    }

    $('#insurederBirthDate').datepicker({
        view: 'years',
        autoClose: 'true',
        dateFormat: 'dd.mm.yyyy',
        startDate: tempVar
    });
    if (defaultData['client_birthdate']) {
        tempArray = defaultData['client_birthdate'].split('.');
        tempDate = new Date(tempArray[2], tempArray[1]-1, tempArray[0]);
        $('#insurederBirthDate').datepicker().data('datepicker').selectDate(tempDate);
        //console.log ('У клиента указанна дата рождения');
    } else {

    }

    //потом количество путешественников (и их дату рождения)
    for (i = 0; i < defaultData['travelers'].length; i++) {
        if (defaultData['travelers'][i]) {
            $('#traveler' + i).css('display', 'block');
            $('#trAccept' + i).prop('value', 'true');
            $('#trAccept' + i).prop('checked', 'true');
            if (defaultData['travelers'][i]['id']) {
                //var tempVar = defaultData['travelers'][i]['id'];
                //var tempObj = document.querySelector('#trId' + i);
                document.querySelector('#trId' + i).value = defaultData['travelers'][i]['id'];
                //console.log('Tr Id ' + tempObj.value);
            }
            $('#trFirstName' + i).prop('disabled', false);
            if (defaultData['travelers'][i]['first_name']) document.querySelector('#trFirstName' + i).value = defaultData['travelers'][i]['first_name'];
            $('#trLastName' + i).prop('disabled', false);
            if (defaultData['travelers'][i]['last_name']) document.querySelector('#trLastName' + i).value = defaultData['travelers'][i]['last_name'];
            $('#trBirthDate' + i).prop('disabled', false);

            if (defaultData['travelers'][i]['birth_date']) {
                tempVar = new Date();
                tempArray = defaultData['travelers'][i]['birth_date'].split('.');
                tempBirhDate = new Date(tempArray[2], tempArray[1]-1, tempArray[0]);
                document.querySelector('#trAge' + i).value = tempVar.getFullYear() - tempBirhDate.getFullYear();

                $('#trBirthDate' + i).datepicker({
                    view: 'years',
                    autoClose: 'true',
                    dateFormat: 'dd.mm.yyyy',
                    startDate: tempBirhDate
                });

                $('#trBirthDate' + i).datepicker().data('datepicker').selectDate(tempBirhDate);
            }
            console.log ('Установили данные застрахованного ' + i);
        }
    }

    //укажем цену выбранного полиса, если она есть в данных
    if (defaultData['policy_cost'] != null) document.querySelector('#prem b').innerHTML = defaultData['policy_cost'];

    //указать выбранную валюту
    if (defaultData['policy_currency'] == 'EUR') {
        document.querySelector('#radio_euro').checked = true;
        document.querySelector('#radio_usd').checked = false;
    } else {
        document.querySelector('#radio_euro').checked = false;
        document.querySelector('#radio_usd').checked = true;
    }

    //показать выделенные на предыдущей странице риски
    //сумма медицинской страховки
    document.querySelector('#radio_medical_amount_' + defaultData['risks'][0]['risk_amount']).checked = true;

    //остальные риски
    if ('risks' in defaultData) {   //хз нужна ли эта проверка, массив в любом случае есть, один элемент (медицинская)
        tempArr = defaultData['risks'];
        tempArr.forEach(function (risk) {
            switch (risk['risk_name']) {
                case 'public':  //сумма страховки гражданской отвественности
                    document.querySelector('#additional_public').checked = true;
                    document.getElementsByName('risks[1][accept]')[0].value = true;
                    tempObj = document.getElementsByName('risks[1][risk_amount]');
                    tempObj.forEach(function (item) {
                        item.disabled = false;
                    });
                    document.querySelector('#radio_civil_responsibility_' + risk['risk_amount']).checked = true;
                    break;
                case 'cancel':
                    document.querySelector('#additional_cancel').checked = true;
                    document.getElementsByName('risks[2][accept]')[0].value = true;
                    tempObj = document.getElementsByName('risks[2][risk_amount]');
                    tempObj.forEach(function (item) {
                        item.disabled = false;
                    });
                    document.querySelector('#radio_cancel_' + risk['risk_amount']).checked = true;
                    break;
                case 'accidient':   //сумма страховки от несчастных случаев
                    document.querySelector('#additional_accident').checked = true;
                    document.getElementsByName('risks[3][accept]')[0].value = true;
                    tempObj = document.getElementsByName('risks[3][risk_amount]');
                    tempObj.forEach(function (item) {
                        item.disabled = false;
                    });
                    document.querySelector('#radio_accident_' + risk['risk_amount']).checked = true;
                    break;
                case 'laggage': //сумма страховки багажа
                    document.querySelector('#additional_laggage').checked = true;
                    document.getElementsByName('risks[4][accept]')[0].value = true;
                    tempObj = document.getElementsByName('risks[4][risk_amount]');
                    tempObj.forEach(function (item) {
                        item.disabled = false;
                    });
                    document.querySelector('#radio_laggage_' + risk['risk_amount']).checked = true;
                    break;
            }

        });
    }

    //показать выделенные на предыдущей странице виды спорта
    /*if ('additionalConditions' in defaultData) {
     tempArr = defaultData['additionalConditions'] ;
     for (key in tempArr) {
     if (tempArr[key]['accept'] === 'true') document.querySelector('#additionalConditions' + key).checked = true;
     }
     }*/
    for (i = 0; i <3; i++) {
        if (defaultData['additional_condition_' + i]){
            document.querySelector('#additionalConditions' + i).checked = true;
        }
    }

}

//Отправка на рассчет деталей полиса
const chDetails = (url, csrf) => {
    ajaxRequest(url, csrf, collectData(), updDetails, 'post');
    //console.log('Данные деталей отправлены')
};

// Обновляем блок с деталями полиса (ценой)
const updDetails = (defaultData, company) => {
    response = JSON.parse(defaultData);

    var companyId = document.querySelector('#companyId').value;
    if (response.hasOwnProperty(companyId) && response[companyId].hasOwnProperty('prem')) {
        document.querySelector('.prem b').innerHTML = response[companyId]['prem'];
        document.querySelector('.fa').style.display = 'inline';
        document.querySelector('#submitBtn').disabled = false;
    } else {
        document.querySelector('.prem b').textContent = 'Нет в наличии';
        document.querySelector('.fa').style.display = 'none';
        document.querySelector('#submitBtn').disabled = true;
    }

    /*if (response.hasOwnProperty('vsk') && response['vsk'].hasOwnProperty('prem')) {
     document.querySelector('.prem b').innerHTML = response['vsk']['prem'];
     } else {
     document.querySelector('.prem b').textContent = 'Нет в наличии';
     }*/

    console.log ('Details Parse');
    //console.log(response);

};

//Послать форму что бы получить блок результатом покупки
const sendDetails = (cardId) => {

    var tempForm = document.forms.form_details;
    var checked = false;
    tempForm.policeAmount.value = document.querySelector('#prem b').innerText;
    checked = true;
    if (checked) {
        console.log ('Form submit');
        tempForm.submit();
    } else {
        console.log ('Form error');
    }

};

//Аджакс запрос
const ajaxRequest = (url, csrf, args, func, method) => {
    let Request = new XMLHttpRequest();

    if(!Request)
        return;
    Request.onreadystatechange = () => {
        if(Request.readyState === 4) {
            func(Request.responseText);
        }
    };

    Request.open(method, url);

    Request.setRequestHeader("X-CSRF-TOKEN", csrf);
    Request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    tempArray = args.split('&');
    console.log(tempArray);

    Request.send(args);
};

/**
 * Собрать данные со страницы и создать из них строку типа form-urlencoded
 */
function collectData () {

    let currency = document.querySelector('#radio_euro').checked ? 'EUR' : 'USD';

    if (document.querySelector('#additionalConditions0').checked) {
        $('#msActiveMain').magicSuggest().enable();
        $('#msActiveOther').magicSuggest().enable();
    } else {
        $('#msActiveMain').magicSuggest().disable();
        $('#msActiveOther').magicSuggest().disable();
    }

    if (document.querySelector('#additionalConditions1').checked) {
        $('#msProfiMain').magicSuggest().enable();
        $('#msProfiOther').magicSuggest().enable();
    } else {
        $('#msProfiMain').magicSuggest().disable();
        $('#msProfiOther').magicSuggest().disable();
    }

    let medical_amount = 30000;
    tempObj = document.getElementsByName('risks[0][risk_amount]');
    for( i = 0; i < tempObj.length; i++) {
        if(tempObj[i].checked) {
            medical_amount = tempObj[i].value;
            break;
        }
    }

    let public_amount = 10000;
    document.getElementsByName('risks[1][accept]')[0].value = document.querySelector('#additional_public').checked;
    tempObj = document.getElementsByName('risks[1][risk_amount]');
    for( i = 0; i < tempObj.length; i++) {
        tempObj[i].disabled = !document.querySelector('#additional_public').checked;
        if(tempObj[i].checked) {
            public_amount = tempObj[i].value;
            //break;
        }
    }

    let cancel_amount = 500;
    document.getElementsByName('risks[2][accept]')[0].value = document.querySelector('#additional_cancel').checked;
    document.getElementsByName('cancel_visa')[0].disabled = !document.querySelector('#additional_cancel').checked;
    tempObj = document.getElementsByName('risks[2][risk_amount]');
    for( i = 0; i < tempObj.length; i++) {
        tempObj[i].disabled = !document.querySelector('#additional_cancel').checked;
        if(tempObj[i].checked) {
            cancel_amount = tempObj[i].value;
            //break;
        }
    }

    let accident_amount = 1000;
    document.getElementsByName('risks[3][accept]')[0].value = document.querySelector('#additional_accident').checked;
    document.getElementsByName('accident_flight')[0].disabled = !document.querySelector('#additional_accident').checked;
    tempObj = document.getElementsByName('risks[3][risk_amount]');
    for (i = 0; i < tempObj.length; i++) {
        tempObj[i].disabled = !document.querySelector('#additional_accident').checked;
        if (tempObj[i].checked) {
            accident_amount = tempObj[i].value;
        }
    }

    let laggage_amount = 1000;
    document.getElementsByName('risks[4][accept]')[0].value = document.querySelector('#additional_laggage').checked;
    document.getElementsByName('laggage_time')[0].disabled = !document.querySelector('#additional_laggage').checked;
    tempObj = document.getElementsByName('risks[4][risk_amount]');
    for( i = 0; i < tempObj.length; i++) {
        tempObj[i].disabled = !document.querySelector('#additional_laggage').checked;
        if(tempObj[i].checked) {
            laggage_amount = tempObj[i].value;
        }
    }

    tempObj = document.getElementsByName('pregnancy');
    for( i = 0; i < tempObj.length; i++) {
        tempObj[i].disabled = !document.querySelector('#additional_pregnancy').checked;
    }

    document.querySelector('#additionalConditions0').value = document.querySelector('#additionalConditions0').checked;
    document.querySelector('#additionalConditions1').value = document.querySelector('#additionalConditions1').checked;
    document.querySelector('#additionalConditions2').value = document.querySelector('#additionalConditions2').checked;

    let args = 'countries[0][country_name]=';

    //собираем массив стран путешествия
    let items = $('#msCountries').magicSuggest().getSelection();
    if (items.length > 0) {
        if (items[0].countryName != '') {
            args += items[0].countryName;
        } else {
            args += 'SCHENGEN';
        }
    }
    if (items.length > 1) {
        for (i = 1; i < items.length; i++) {
            args += '&countries[' + i + '][country_name]=' + items[i].countryName;
        }
    }

    //даты начала и конца страхования
    args += '&dateFrom=' + document.querySelector('#dateFrom').value + '&dateTill=' + document.querySelector('#dateTill').value;

    tempVar = document.querySelectorAll('.checkbox-one');
    //данные о застрахованных
    args += '&travelers[0][accept]=' + document.querySelectorAll('.checkbox-one')[0].checked +
        '&travelers[0][age]=' + document.querySelectorAll('.age-human')[0].value +
        '&travelers[1][accept]=' + document.querySelectorAll('.checkbox-one')[1].checked +
        '&travelers[1][age]=' + document.querySelectorAll('.age-human')[1].value +
        '&travelers[2][accept]=' + document.querySelectorAll('.checkbox-one')[2].checked +
        '&travelers[2][age]=' + document.querySelectorAll('.age-human')[2].value +
        '&travelers[3][accept]=' + document.querySelectorAll('.checkbox-one')[3].checked +
        '&travelers[3][age]=' + document.querySelectorAll('.age-human')[3].value +
        '&travelers[4][accept]=' + document.querySelectorAll('.checkbox-one')[4].checked +
        '&travelers[4][age]=' + document.querySelectorAll('.age-human')[4].value;

    //данные о рисках
    args += '&risks[0][name]=medical&risks[0][amountCurrency]=' + currency +
        '&risks[0][accept]=true&risks[0][amountAtRisk]=' + medical_amount +
        '&risks[1][name]=public&risks[1][amountCurrency]=' + currency +
        '&risks[1][accept]=' + document.querySelector('#additional_public').value + '&risks[1][amountAtRisk]=' + public_amount +
        '&risks[2][name]=cancel&risks[2][amountCurrency]=' + currency +
        '&risks[2][accept]=' + document.querySelector('#additional_cancel').value + '&risks[2][amountAtRisk]=' + cancel_amount +
        '&risks[3][name]=accident&risks[3][amountCurrency]=' + currency +
        '&risks[3][accept]=' + document.querySelector('#additional_accident').value + '&risks[3][amountAtRisk]=' + accident_amount +
        '&risks[4][name]=laggage&risks[4][amountCurrency]=' + currency +
        '&risks[4][accept]=' + document.querySelector('#additional_laggage').value + '&risks[4][amountAtRisk]=' + laggage_amount;
    //дополнительные условия страхования
    args += '&additionalConditions[0][name]=leisure&additionalConditions[0][accept]=' + document.querySelector('#additionalConditions0').value +
        '&additionalConditions[1][name]=competition&additionalConditions[1][accept]=' + document.querySelector('#additionalConditions1').value +
        '&additionalConditions[2][name]=extreme&additionalConditions[2][accept]=' + document.querySelector('#additionalConditions2').value;

    //данные о видах спорта
    items = $('#msActiveMain').magicSuggest().getSelection();
    if (items.length > 0) {
        items.forEach (function (item, i) {
            args += '&sportActiveMain[' + i + ']=' + item.sportName;
        })
    }
    items = $('#msActiveOther').magicSuggest().getSelection();
    if (items.length > 0) {
        items.forEach (function (item, i) {
            args += '&sportActiveOther[' + i + ']=' + item.sportName;
        })
    }

    items = $('#msProfiMain').magicSuggest().getSelection();
    if (items.length > 0) {
        items.forEach (function (item, i) {
            args += '&sportProfiMain[' + i + ']=' + item.sportName;
        })
    }
    items = $('#msProfiOther').magicSuggest().getSelection();
    if (items.length > 0) {
        items.forEach (function (item, i) {
            args += '&sportProfiOther[' + i + ']=' + item.sportName;
        })
    }

    return args;
}