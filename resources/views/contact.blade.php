<div class="full-width-bgrd2">

  <form method="post" action="{{ route('contact.store') }}">

    {{ csrf_field() }}

    <div class="contact-form">

      <label class="input-label">First Name</label>
        <input class="input-text-name" type="text" id="fname" name="firstname" placeholder="Your name..">
      <label class="input-label">Last Name</label>
        <input class="input-text-name" type="text" id="email" name="email" placeholder="Your email..">
      <label class="input-label">Subject</label>
        <textarea class="input-text-name" id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>
      <button type="submit" class="buttonS3">Envoyer</button>
    </div>

   </form>
  </div>
  <style>

      .full-width-bgrd2{
        padding-top: 100px;
            height: 700px !important;
              background: linear-gradient(to bottom right, #0099ff 50%, #000099 50%);
            background-size: cover;
          }
      .p4 {
        color: white;
          text-align:left !important;
          margin-top:120px;
          color:#000099 ;

      }
      .p5 {
        color: white;
          text-align:left !important;

          color:#000099 ;

      }

      .input-text-name{

           width: 100%;
          padding: 12px 20px;
          margin: 8px 0;
          box-sizing: border-box;

      }
      .input-label{
          color:white;
          align:center;

      }
      .buttonS3{

          border-radius: 25px;
          text-align: center;
          border: 2px solid blue;
          box-shadow: 1px 2px 10px rgba(0, 0, 0, 0.5);
          background-color: Transparent;
          padding: 16px 32px;
          font-size: 16px;
    margin-left: 40%;
          color: white;

    }
      .contact-form{
        width:60%;
        height:65%;
        background: #000099;
        margin-left:20%;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
      }

    </style>
