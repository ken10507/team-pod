<!--以下js-->
    <!--Jqueryを読み込む-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!--FireBaseを読み込む-->
    <script src="https://www.gstatic.com/firebasejs/5.5.1/firebase.js"></script>
    <script>
      // Initialize Firebase
    
      var config = {
        apiKey: "AIzaSyCk15U7-ZWT3jdYzkuorBBFNpmbFE-Frl4",
        authDomain: "team-pod-chat.firebaseapp.com",
        databaseURL: "https://team-pod-chat.firebaseio.com",
        projectId: "team-pod-chat",
        storageBucket: "team-pod-chat.appspot.com",
        messagingSenderId: "1031570769292"};
        
        firebase.initializeApp(config);
        
        // ここから処理
        //メッセージ送受信準備（関数を作成）
        const newPostRef = firebase.database(); 
        
        //送信ボタンをクリックした時の処理
        $("#send").on("click",function(){
        // テキストエリアの情報を取得
        let tt = $("#text").val()
        if(tt == ""){
            return false;
        }else{
        //今の時間を取得
            dd = new Date();
            hours = dd.getHours();
            minutes = dd.getMinutes();
        //firebaseの関数を呼び出す
        newPostRef.ref('{{$team->id}}/{{Auth::user()->id}}/chatroom').push({//オブジェクトの形で送る
            userid:'{{Auth::user()->id}}',
            name:'{{Auth::user()->name}}',
            userimg:'{{Auth::user()->user_img}}',
            text:$("#text").val(),//text取得
            hours:hours,//hourを代入
            minutes:minutes,//minitを代入
        });
        $("#text").val("");//textareaを空欄にする
        }
    });
    
    //エンターキーで送信
    $("#text").on("keydown",function(e){//テキストエリアでボタンが押された時

        if(e.keyCode == 13){//もしkeycode13（エンターキー）ならば
            //今の時間を取得
            let dd = new Date();
            let hours = dd.getHours();
            let minutes = dd.getMinutes();
            //firebaseの関数を呼び出す
            newPostRef.ref('{{$team->id}}/{{Auth::user()->id}}/chatroom').push({//オブジェクトの形で送る
                userid:'{{Auth::user()->id}}',
                name:'{{Auth::user()->name}}',
                userimg:'{{Auth::user()->user_img}}',
                text:$("#text").val(),//text取得
                hours:hours,//hourの取得
                minutes:minutes,//minitの取得
            });
            $("#text").val("");
        }
        
    });
    
    //メッセージデータを受信
    //child_added:毎回１個//value:毎回全てのデータを取得
    function get(){
        newPostRef.ref('{{$team->id}}/{{Auth::user()->id}}/chatroom').on('child_added',function(data){
            const v = data.val();//vにデータを取得し代入
            
            if(v.userid == '{{Auth::user()->id}}'){    
      
                //以下outputエリアに取得した情報を表示させるための処理
                let right = "";
                right +='<li class="d-flex justify-content-between mb-4" style="display:flex; background: antiquewhite; padding: 1%; margin: 1%; border-radius: 5%; float: right; clear: both;"><div class="chat-body white p-3 z-depth-1"><div class="header" style="text-align: right;"><strong class="primary-font">';
                right += v.name+'さん';
                right +='</strong></div><hr class="w-100" style="border-color: darkslategray;"><p class="mb-0" style="color: black;">';
                right += v.text;
                // right += '</p></div><img src="upload/'+v.userimg+'" alt="avatar" class="avatar rounded-circle mr-0 ml-3 z-depth-1" style="width: 4rem; height: 4rem;"></li>';
                right += '</p></div><form style="display:table-cell; text-align:center" method="post" action="{{ url("/user") }}">{{ csrf_field() }}<input type="image" src="/upload/'+v.userimg+'" class="img-circle" style="width: 3rem; height: 3rem; border-radius: 50%;"/><input type="hidden" name="user_id" value="'+v.userid+'"/></form></li>';
                
                $("#output").append(right);//strをprependする
                
        }else{
            
            let left = "";
                left += '<li class="d-flex justify-content-between mb-4" style="display:flex; background: antiquewhite; padding: 1%; margin: 1%; border-radius: 5%; float: left; clear: both;"><form style="display:table-cell; text-align:center" method="post" action="{{ url("/user") }}">{{ csrf_field() }}<input type="image" src="/upload/'+v.userimg+'" class="img-circle" style="width: 3rem; height: 3rem; border-radius: 50%;"/><input type="hidden" name="user_id" value="'+v.userid+'"/></form><div class="chat-body white p-3 ml-2 z-depth-1"><div class="header"><strong class="primary-font">'+v.name+'さん</strong></div><hr class="w-100" style="border-color: darkslategray;"><p class="mb-0" style="color: black;">';
                left += v.text;
                left += '</p></div></li>';
                $("#output").append(left);
            }
            
        });
    };
    
    get();
    </script>