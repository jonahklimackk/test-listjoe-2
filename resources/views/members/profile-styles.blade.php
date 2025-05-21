

<div class="wrapper">
  <style>
    .sidebar_vda {
      memb        display: none;
    }
    .content > .wrapper {
      margin-left: -27px;
      width: 100%;
    }
    .content > .sidebar {
      margin-top: 31px;
      margin-left: 3px;
      position: absolute;
    }
    .content > .sidebar > .menu {
      background: white;
      display: none;
      box-shadow: gray 0px 0px 22px;
      padding: 3px;
      height: 370px;
      z-index: 10000;
      position: relative;
    }
    .menu_button {
      color: white;
      font-size: 16px;
      font-family: NewJune-Bold;
      background: #1D70C3;
      position: absolute;
      cursor: pointer;
      left: 0px;
      padding: 9px 145px 6px 11px;
      top: 0px;
      border-radius: 0 0 4px 4px;
    }
    .menu_button > .down {
      background: url('/img/menu_arrow_down.png');
      width: 22px;
      height: 11px;
      position: absolute;
      right: 23px;
      top: 9px;
    }
    .profile_page {
      width: 720px;
      margin: 30px 0 0 200px;
    }
    .profile_page .info {
      margin-top: 17px;
      overflow: hidden;
    }
    .profile_page .info .left {
      float:left;
    }
    .profile_page .info .left .photo{
      border-radius: 100px;
    }
    .profile_page .info .left .socnet {
      margin: 10px 14px;
    }
    .profile_page .info .left .s,
    .profile_page .info .left .t,
    .profile_page .info .left .f,
    .profile_page .info .left .g{
      height: 32px;
      width: 32px;
      background: url('/img/profile_page.png');
      float: left;
      margin-right: 12px;
      cursor: pointer;
    }
    .profile_page .info .left .s {
      background-position: -206px -34px;
    }
    .profile_page .info .left .f {
      background-position: -32px 0;
    }
    .profile_page .info .left .g {
      background-position: -64px 0;
    }

    .profile_page .info .stat{
      float:left;
      margin: 6px 10px;
      width: 202px;
    }
    .profile_page .info .stat .line{
      margin-bottom: 7px;
    }
    .profile_page .info .stat .name{
      color: #1C72BF;
      font-weight: bold;
      font-size: 31px;
      margin-bottom: 21px;
    }
    .profile_page .info .stat .rating{
      height: 40px;
      width: 201px;
      background: url('/img/profile_page.png') 0px -32px;
    }
    .profile_page .info .stat .rating .value {
      color: #FEB501;
      font-weight: bold;
      position: absolute;
      margin: 7px 0 0 117px;
      width: 79px;
      text-align: center;
      font-size: 29px;
    }
    .profile_page .info .stat .rating .arrow{
      background: url('/img/profile_block_arrow.png');
      width: 10px;
      height: 5px;
      position: absolute;
      margin-top: 20px;
    }

    .profile_page .info .downline{
      float: left;
      background: #FFEEA0;
      width: 237px;
      min-height: 166px;
      margin: 26px 0 0 24px;
      padding: 13px;
      position: relative;
    }
    .profile_page .info .downline a {
      text-decoration: none;
    }
    .profile_page .info .downline .photo {
      height: 40px;
      width: 40px;
      border-radius: 40px;
      margin: 0 7px 7px 0;
    }
    .profile_page .info .downline .title {
      height: 29px;
      width: 152px;
      background: url('/img/profile_page.png') 0px -73px;
      position: absolute;
      top: -22px;
      left: -8px;
    }

    .profile_page .messages{
      clear: both;
      background: #ECF5FC;
      width: 682px;
      margin-top: 9px;
      margin-left: 9px;
      position: relative;
      padding: 11px;
    }
    .profile_page .messages .title {
      height: 30px;
      width: 152px;
      background: url('/img/profile_page.png') -96px 0px;
      position: absolute;
      top: -23px;
      left: -8px;
    }
    .profile_page .messages .send_message textarea {
      width: 80%;
      margin: 30px 0 0 64px;
      height: 100px;
    }

     .profile_page .messages .send_message1 textarea {
      width: 80%;
      margin: 30px 0 0 64px;
      height: 100px;
    }
     .profile_page .messages .send_message2 textarea {
      width: 80%;
      margin: 30px 0 0 64px;
      height: 100px;
    }
    .profile_page .messages .message {
      margin: 10px;
      font-size: 12px;
      overflow: hidden;
      padding: 10px;
    }
    .profile_page .messages .message .left{
      float: left;
      margin-right: 13px;
      width: 72px;
      text-align: center;
    }
    .profile_page .messages .message .right{

    }

    .profile_page .messages .message .name{
      font-weight: bold;
    }

    .profile_page .messages .message .avatar {
      text-align: center;
    }
    .profile_page .messages .message .avatar img {
      border-radius: 20px;
    }
    .profile_page .messages .message .time{
      color: #1E71C1;
    }

    .profile_page .messages .message .text{

    }
    .profile_page .messages .message .remove,
    .profile_page .messages .message .reply {
      visibility: hidden;
      color: #1B70C1;
      text-decoration: underline;
      cursor: pointer;
      float: right;
      margin: 5px;
    }
  </style>