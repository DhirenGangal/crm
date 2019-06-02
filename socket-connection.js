var socket = "ws://54.214.193.66:12345";
// $.ajax({
//     url : "../../getip.php",
//     data : "",
//     type : "GET",
//     async : false,
//     success : function(resp){
//         let data = resp.trim();
//         console.log("Serbver Ip :"+ data);
//         socket = "ws://"+data+":12345/";
//     },
//     error : function(err){
//         console.log("Error while getting IP address");
//     }
// });


var websocket;
function init() {
    //edited by krrish
    window.WebSocket = window.WebSocket || window.MozWebSocket; //setting websocket for chrome , mozilla
     if (!window.WebSocket) {
        alert('Sorry, but your browser doesn\'t support WebSocket.');
        return false;
     }
    //end
    DemoWebSocket();
}
function DemoWebSocket() {
    if(websocket != undefined)
        if(websocket.readyState === websocket.OPEN){
            window.dispatchEvent(new Event("opened"));
            return;
        }

    websocket = new WebSocket(socket);
    console.log(websocket);
    websocket.onopen = function (event) {  //Event handler for open
        window.dispatchEvent(new Event("opened"));
        onOpen(event);
    };
    websocket.onclose = function (event) {  //Event handler for close
        onClose(event);
    };
    websocket.onmessage = function (event) {   //Event handler for message
        onMessage(event)
    };
    websocket.onerror = function (event) { //Event handler for error
        onError(event);
    };
}

window.addEventListener("connect", init, true);

