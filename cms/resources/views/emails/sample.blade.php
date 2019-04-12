<!DOCTYPE html>
<html lang="ja">
<style>
  body {
    background-color: #fffacd;
  }
  h1 {
    font-size: 16px;
    color: #ff6666;
  }
  #button {
    width: 200px;
    text-align: center;
  }
  #button a {
    padding: 10px 20px;
    display: block;
    border: 1px solid #2a88bd;
    background-color: #FFFFFF;
    color: #2a88bd;
    text-decoration: none;
    box-shadow: 2px 2px 3px #f5deb3;
  }
  #button a:hover {
    background-color: #2a88bd;
    color: #FFFFFF;
  }
</style>
<body>
<h1>
  Hello!!
</h1>
<p>
  This mail is Team-pod's member registration email!
</p>
<p>
  {{$name}}さんからTeam-Podでチーム{{$team_name}}への招待がありました。  
</p>
<p>以下のURLより会員登録とチームへの参加をしてください！</p>
<p id="button">
  <a href="https://ken1-portfolio.sakura.ne.jp/memberAdd/newmt/{{$team_id}}">チームJOIN</a>
</p>
</body>
</html>


