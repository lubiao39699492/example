function dump(obj){
  if(typeof window.console != 'undefined'){
      var userAgent = navigator.userAgent;
      var isOpera = userAgent.indexOf("Opera") > -1;
      var isIE = userAgent.indexOf("compatible") > -1 && userAgent.indexOf("MSIE") > -1 && !isOpera;
      var isFF = userAgent.indexOf("Firefox") > -1;
      var isSafari = userAgent.indexOf("Safari") > -1;
      var isOut = false;
      if (isIE) {
          var reIE = new RegExp("MSIE (\\d+\\.\\d+);");
          reIE.test(userAgent);
          var fIEVersion = parseFloat(RegExp["$1"]);
          if(fIEVersion < 9.0){
            isOut = true;
          }
      }
    if(isOut){
      if(typeof obj == 'object'){
        if(obj.outerHTML){
          obj = obj.outerHTML;
        }else{
          obj = JSON.stringify(obj);
        }
      }
      console.log(obj);
    }else{
      console.log(obj);
    }
  }else{
    if(typeof obj == 'object'){
      if(obj.outerHTML){
        obj = obj.outerHTML;
      }else{
        obj = JSON.stringify(obj);
      }
    }
    alert(JSON.stringify(obj));
  }
}
