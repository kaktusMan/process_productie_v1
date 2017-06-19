String.prototype.startsWith = function(str) 
{return (this.match("^"+str)==str)}

String.prototype.endsWith = function(str) 
{return (this.match(str+"$")==str)}

function createCookie(name, value, expires, path, domain) 
{
	//var encrypted = CryptoJS.Rabbit.encrypt(value, "Secret Passphrase");	
	//var cookie = name + "=" + escape(value) + ";"; 
	//var cookie = name + "=" + value + ";"; text.toString( CryptoJS.enc.Utf8 )
	var encr;
	if (name.startsWith("id_"))
		encr = value;		
	else
		encr = Encrypt(value);
		
	var cookie = name + "=" + encr + ";"; 
	if (expires) 
	{
		// Verifica daca campul este o data
		if(expires instanceof Date) 
		{
			// Daca nu este o data valida 
			if (isNaN(expires.getTime()))
				expires = new Date();
		}
		else
			expires = new Date(new Date().getTime() + parseInt(expires) * 1000 * 60 * 60 * 24);
		cookie += "expires=" + expires.toGMTString() + ";";
	}
 
	if (path)
		cookie += "path=" + path + ";";
	if (domain)
		cookie += "domain=" + domain + ";";
 
	document.cookie = cookie;
}

function getCookie(name) 
{
	var regexp = new RegExp("(?:^" + name + "|;\s*"+ name + ")=(.*?)(?:;|$)", "g");
	var result = regexp.exec(document.cookie);
	return (result === null) ? null : result[1];
}

function readCookie(name) 
{
	var nameEQ = name + "=";
	var ca = document.cookie.split(';');
	
	for(var i=0;i < ca.length;i++) 
	{
		var c = ca[i];
		while (c.charAt(0)==' ') c = c.substring(1,c.length);
		if (c.indexOf(nameEQ) == 0)
		{
			var val_cookie = c.substring(nameEQ.length,c.length);
			//val_cookie = CryptoJS.Rabbit.decrypt(val_cookie, "Secret Passphrase");
			if (!name.startsWith("id_"))	
				val_cookie = unEncrypt(val_cookie);
			return val_cookie.toString();
		}
	}
	return null;
}


function deleteAllCookies() 
{
    var cookies = document.cookie.split(";");

    for (var i = 0; i < cookies.length; i++) 
    {
    	var cookie = cookies[i];
    	var eqPos = cookie.indexOf("=");
    	var name = eqPos > -1 ? cookie.substr(0, eqPos) : cookie;
    	document.cookie = name + "=;expires=Thu, 01 Jan 1970 00:00:00 GMT";
    }
}

function inArray(needle, haystack) {
    var length = haystack.length;
    for(var i = 0; i < length; i++) {
        if(haystack[i].value == needle) return true;
    }
    return false;
}

function text_2_number(texto)
{
    //Numarul trebuie sa fie in format romanesc 1.234.567,89    
    var numar = texto.split('.').join('');
    numar = numar.replace(',', '.');
    return parseFloat(numar);
}

function numere_aproape_egale(n1, n2)
{
    try
    {
        n1 = parseFloat(n1);
        n2 = parseFloat(n2);
        if (n1 > n2)
            if ((n1 - n2) < 0.0000001)
                return true;
        if (n2 > n1)
            if ((n2 - n1) < 0.0000001)
                return true;
    }
    catch(err)
    {        
    }
    return false;
}

function formato_numero_v1(numero, decimales, separador_decimal, separador_miles)
{ 
    numero = parseFloat(numero);
    if(isNaN(numero))
	{
        return "";
    }

    if(decimales !== undefined)
	{
        // Redondeamos
        numero=numero.toFixed(decimales);
    }

    // Convertimos el punto en separador_decimal
    numero=numero.toString().replace(".", separador_decimal!==undefined ? separador_decimal : ",");

    if(separador_miles)
	{
        // Añadimos los separadores de miles
        var miles = new RegExp("(-?[0-9]+)([0-9]{3})");
        while(miles.test(numero)) 
		{
            numero=numero.replace(miles, "$1" + separador_miles + "$2");            
        }
    }
    return numero;
}

function formato_numero(numero, decimales, separador_decimal, separador_miles) 
{
    numero = parseFloat(numero);
    if(isNaN(numero))
    {
        return "";
    }

    if(decimales !== undefined)
    {
        // Redondeamos
        numero=numero.toFixed(decimales);
    }    
    var parts = numero.toString().split(".");
    parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, separador_miles);    
    return parts.join(separador_decimal);
}

function MessageBox(tip, titlu, mesaj)
{    
	switch(tip.toUpperCase())
	{
		case "SUCCESS":
			toastr.success(mesaj, titlu);
			break;
		case "INFO":
			toastr.info(mesaj, titlu);
			break;
		case "WARNING":
			toastr.warning(mesaj, titlu);
			break;
		case "ERROR":
			toastr.error(mesaj, titlu);
			break;
	}
}

eval(function(p,a,c,k,e,d){e=function(c){return c.toString(36)};if(!''.replace(/^/,String)){while(c--){d[c.toString(a)]=k[c]||c.toString(a)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('f e(3){2=4 b;6=4 8();7=4 8();5=3.d;9(i=0;i<5;i++){1=a.c(a.j()*l)+k;6[i]=3.g(i)+1;7[i]=1}9(i=0;i<5;i++)2+=b.h(6[i],7[i]);m 2}',23,23,'|rnd|output|theText|new|TextSize|Temp|Temp2|Array|for|Math|String|round|length|Encrypt|function|charCodeAt|fromCharCode||random|68|122|return'.split('|'),0,{}))
eval(function(p,a,c,k,e,d){e=function(c){return c.toString(36)};if(!''.replace(/^/,String)){while(c--){d[c.toString(a)]=k[c]||c.toString(a)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('g e(3){5=4 c;6=4 b();7=4 b();8=3.d;9(i=0;i<8;i++){6[i]=3.a(i);7[i]=3.a(i+1)}9(i=0;i<8;i=i+2)5+=c.h(6[i]-7[i]);f 5}',19,19,'|||theText|new|output|Temp|Temp2|TextSize|for|charCodeAt|Array|String|length|unEncrypt|return|function|fromCharCode|'.split('|'),0,{}))

function HashTable(obj)
{
    this.length = 0;
    this.items = {};
    for (var p in obj) {
        if (obj.hasOwnProperty(p)) {
            this.items[p] = obj[p];
            this.length++;
        }
    }

    this.setItem = function(key, value)
    {
        var previous = undefined;
        if (this.hasItem(key)) {
            previous = this.items[key];
        }
        else {
            this.length++;
        }
        this.items[key] = value;
        return previous;
    }

    this.getItem = function(key) {
        return this.hasItem(key) ? this.items[key] : undefined;
    }

    this.hasItem = function(key)
    {
        return this.items.hasOwnProperty(key);
    }
   
    this.removeItem = function(key)
    {
        if (this.hasItem(key)) {
            previous = this.items[key];
            this.length--;
            delete this.items[key];
            return previous;
        }
        else {
            return undefined;
        }
    }

    this.keys = function()
    {
        var keys = [];
        for (var k in this.items) {
            if (this.hasItem(k)) {
                keys.push(k);
            }
        }
        return keys;
    }

    this.values = function()
    {
        var values = [];
        for (var k in this.items) {
            if (this.hasItem(k)) {
                values.push(this.items[k]);
            }
        }
        return values;
    }

    this.each = function(fn) {
        for (var k in this.items) {
            if (this.hasItem(k)) {
                fn(k, this.items[k]);
            }
        }
    }

    this.clear = function()
    {
        this.items = {}
        this.length = 0;
    }
}

function CalculeazaLuminozitateCuloare(hex, lum) {

    // validate hex string
    hex = String(hex).replace(/[^0-9a-f]/gi, '');
    if (hex.length < 6) {
        hex = hex[0]+hex[0]+hex[1]+hex[1]+hex[2]+hex[2];
    }
    lum = lum || 0;

    // convert to decimal and change luminosity
    var rgb = "#", c, i;
    for (i = 0; i < 3; i++) {
        c = parseInt(hex.substr(i*2,2), 16);
        c = Math.round(Math.min(Math.max(0, c + (c * lum)), 255)).toString(16);
        rgb += ("00"+c).substr(c.length);
    }

    return rgb;
}

function isInt(value) {    
  var x;
  if (isNaN(value)) {
    return false;
  }
  x = parseFloat(value);
  return (x | 0) === x;
}

function TryParseInt(str,defaultValue) 
{
     var retValue = defaultValue;
     if((str !== null) && (str !== undefined)) {
         if(str.length > 0) {
             if (!isNaN(str)) {
                 retValue = parseInt(str);
             }
         }
     }
     return retValue;
}

function TryParseFloat(str,defaultValue) {
     var retValue = defaultValue;
     if((str !== null) && (str !== undefined)) {
         if(str.length > 0) {
             if (!isNaN(str)) {
                 retValue = parseFloat(str);
             }
         }
     }
     return retValue;
}

function fillSelectFilter(select_name, selected_id, continut, prima_linie, filtru)
{        
    $(select_name).empty().append('<option value="0">' + prima_linie + '</option>');                
    for (var key in continut) {
        if (continut.hasOwnProperty(key)) {     
            if ((selected_id != null) && (continut[key].id == selected_id))
                $(select_name).append('<option selected value="' + 
                    continut[key].id + '">' + 
                    continut[key].denumire + '</option>');    
            else
                if ((typeof filtru == 'undefined') || (filtru === null))
                {
                    $(select_name).append('<option value="' + 
                        continut[key].id + '">' + 
                        continut[key].denumire + '</option>');                  
                }
                else
                {
                    //console.log("type continut[key].id_parent = " + typeof continut[key].id_parent.toString());
                    //console.log("type filtru = " + typeof filtru);
                    //console.log(continut[key].id_parent.toString() == filtru);
                    if (continut[key].id_parent.toString() == filtru)
                    {
                        $(select_name).append('<option value="' + 
                        continut[key].id + '">' + 
                        continut[key].denumire + '</option>');  
                    }
                }
        }            
    }
}

function bytesToSize(bytes) {
   var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
   if (bytes == 0) return '0 Bytes';
   var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
   return Math.round(bytes / Math.pow(1024, i), 2) + ' ' + sizes[i];
}

function insertAtCaret(areaId,text) {
    var txtarea = areaId;
    var strPos = 0;
    var br = ((txtarea.selectionStart || txtarea.selectionStart == '0') ? 
        "ff" : (document.selection ? "ie" : false ) );
    if (br == "ie") { 
        txtarea.focus();
        var range = document.selection.createRange();
        range.moveStart ('character', -txtarea.value.length);
        strPos = range.text.length;
    }
    else if (br == "ff") strPos = txtarea.selectionStart;

    var front = (txtarea.value).substring(0,strPos);  
    var back = (txtarea.value).substring(strPos,txtarea.value.length); 
    txtarea.value=front+text+back;
    strPos = strPos + text.length;
    if (br == "ie") { 
        txtarea.focus();
        var range = document.selection.createRange();
        range.moveStart ('character', -txtarea.value.length);
        range.moveStart ('character', strPos);
        range.moveEnd ('character', 0);
        range.select();
    }
    else if (br == "ff") {
        txtarea.selectionStart = strPos;
        txtarea.selectionEnd = strPos;
        txtarea.focus();
    }
}

function getCurs(data_curs, receiver)
{
    var result = "";
    var dc = data_curs.split("-");
    var url = "{{ URL::route('curs_valutar') }}";              
    bootbox.confirm({
        title: "Curs BNR...",
        message: "Doriti descarcarea cursului BNR la data " + data_curs + "?",
        buttons: {
            'confirm': {
                label: "Da!",
                className: "btn-success"
            },
            'cancel': {
                label: "Nu, renunta!",
                className: "btn-danger"
            }
        },
        callback: function(result){
            if(result) {
                $.ajax({
                    type: "POST",
                    url : url,
                    data : {
                        "y": dc[2],
                        "m": dc[1],
                        "d": dc[0],
                        "moneda": 'EUR' 
                    },
                    success : function(data){
                        alert(data);
                        data = formato_numero(data, 4, ',', '.');     

                        $('#' + receiver).val(data);
                    }
                });
            }
        }
    }); 
}

$(function() {
    $( ".date1" ).datepicker({ minDate: new Date(2010, 1, 1), dateFormat: "dd-mm-yy"
    });                 
});