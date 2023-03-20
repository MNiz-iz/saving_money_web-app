<!DOCTYPE html>
<html>
  <head>
    <title>create goals</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
      html, body {
      min-height: 100%;
      }
      body, div, form, input, select, textarea, label { 
      padding: 0;
      margin: 0;
      outline: none;
      font-family: Roboto, Arial, sans-serif;
      font-size: 14px;
      color: #666;
      line-height: 22px;
      }
      h1 {
      position: absolute;
      margin: 0;
      font-size: 40px;
      color: #fff;
      z-index: 2;
      line-height: 83px;
      }
      .testbox {
      display: flex;
      justify-content: center;
      align-items: center;
      height: inherit;
      padding: 20px;
      }
      form {
      width: 100%;
      padding: 20px;
      border-radius: 6px;
      background: #fff;
      box-shadow: 0 0 8px  #cc7a00; 
      }
      .banner {
      position: relative;
      height: 300px;
      background-image: url("https://assets-global.website-files.com/5ef30243b02a260f4e3aded8/6335119d92b90d4d3d048ff1_X-WpgcOaAjm41oKKZYcD6vvhhk97TrsQd1ZZpX_aWdCzOo4PDjb8yE4KJjiIEkDCGcj_2EdeBhQ2MY6arjxybpuBy_p6uLK2sxpq9cGJtPs-v4B5f-sJxrowLg5ILXo7OsYWpXL-ki_dgNhqVb7nmAlw1W2q-IuRxX_k3d1CpkbsMoiTdNWKmLh1VA.png");  
      background-size: cover;
      display: flex;
      justify-content: center;
      align-items: center;
      text-align: center;
      }
      .banner::after {
      content: "";
      background-color: rgba(0, 0, 0, 0.2); 
      position: absolute;
      width: 100%;
      height: 100%;
      }
      input, select, textarea {
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 3px;
      }
      input {
      width: calc(100% - 10px);
      padding: 5px;
      }
      input[type="date"] {
      padding: 4px 5px;
      }
      textarea {
      width: calc(100% - 12px);
      padding: 5px;
      }
      .item:hover p, .item:hover i, .question:hover p, .question label:hover, input:hover::placeholder {
      color: #cc7a00;
      }
      .item input:hover, .item select:hover, .item textarea:hover {
      border: 1px solid transparent;
      box-shadow: 0 0 3px 0 #cc7a00;
      color: #cc7a00;
      }
      .item {
      position: relative;
      margin: 10px 0;
      }
      .item span {
      color: red;
      }
      input[type="date"]::-webkit-inner-spin-button {
      display: none;
      }
      .item i, input[type="date"]::-webkit-calendar-picker-indicator {
      position: absolute;
      font-size: 20px;
      color: #cc7a00;
      }
      .item i {
      right: 1%;
      top: 30px;
      z-index: 1;
      }
      [type="date"]::-webkit-calendar-picker-indicator {
      right: 1%;
      z-index: 2;
      opacity: 0;
      cursor: pointer;
      }
      input[type=radio], input[type=checkbox]  {
      display: none;
      }
      label.radio {
      position: relative;
      display: inline-block;
      margin: 5px 20px 15px 0;
      cursor: pointer;
      }
      .question span {
      margin-left: 30px;
      }
      .question-answer label {
      display: block;
      }
      label.radio:before {
      content: "";
      position: absolute;
      left: 0;
      width: 17px;
      height: 17px;
      border-radius: 50%;
      border: 2px solid #ccc;
      }
      input[type=radio]:checked + label:before, label.radio:hover:before {
      border: 2px solid #cc7a00;
      }
      label.radio:after {
      content: "";
      position: absolute;
      top: 6px;
      left: 5px;
      width: 8px;
      height: 4px;
      border: 3px solid #cc7a00;
      border-top: none;
      border-right: none;
      transform: rotate(-45deg);
      opacity: 0;
      }
      input[type=radio]:checked + label:after {
      opacity: 1;
      }
      .btn-block {
      margin-top: 10px;
      text-align: center;
      }
      button {
      width: 150px;
      padding: 10px;
      border: none;
      border-radius: 5px; 
      background: #cc7a00;
      font-size: 16px;
      color: #fff;
      cursor: pointer;
      }
      button:hover {
      background: #ff9800;
      }
      @media (min-width: 568px) {
      .name-item, .city-item {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      }
      .name-item input, .name-item div {
      width: calc(50% - 20px);
      }
      .name-item div input {
      width:97%;}
      .name-item div label {
      display:block;
      padding-bottom:5px;
      }
      }
    </style>
   </head>
   <body>
   
    @if (session('status'))
    <div class="alert alert-success">
    {{ session('status') }}
    </div>
    @endif

    <div class="testbox">
      <form action="{{ route('objectivies.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="banner">
          <h1>Create The New Goal</h1>
        </div>
        <div class="item">
            <strong>Name Goals</strong>
            <input type="text" name="name" class="form-control" placeholder="Name Goals">
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="item">
          <strong>picture</strong>
          <input type="file" name="picture" class="form-control" placeholder="picture">
          @error('picture')
          <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="item">
            <strong>price</strong>
            <input type="number" name="price" class="form-control" placeholder="price">
            @error('price')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="item">
            <strong>start day</strong>
            <input type="date" name="start_d" class="form-control" placeholder="start_d">
            @error('start_d')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="item">
          <strong>end day</strong>
          <input type="date" name="end_d" class="form-control" placeholder="end_d">
          @error('end_d')
          <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="btn-block">
          <button type="submit">Create Goal</button>
          <div><a href="{{ route('objectivies.index') }}" class="btn btn-primary mt-2">BACK</a></div>
        </div>
      </form>
    </div>
  </body>
</html>