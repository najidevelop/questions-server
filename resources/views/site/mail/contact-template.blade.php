  <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Contact Email</title>
     <style>
     .thtitle{
         text-align: left;
     padding: 5px;
     }
     </style>
 </head>
 <body>
 <div class="row"></div>
 <div class="col-12">
 <div style="height: 15px; background-color: #178dd2;"></div>
     <p class="lead" style="text-align: center; font-size:20px;padding:10px"><strong>{{$data['com_title']}}</strong></p>
 
     <div class="table-responsive">
       <table class="table">
         <tbody><tr>
           <th   class="thtitle">Name:</th>
           <td>{{$data['name']}}</td>
         </tr>
         <tr>
           <th class="thtitle">Email:</th>
           <td>{{$data['client_mail']}}</td>
         </tr>
         <tr>
           <th class="thtitle">Subject:</th>
           <td>{{$data['subject']}}</td>
         </tr>
         <tr>
           <th class="thtitle" >Message:</th>
           <td>{{$data['message']}}</td>
         </tr>
       </tbody></table>
     </div>
     <div style="height: 15px; background-color: lightgray;margin-top:20px"></div>
   </div>
  
 </body>
 </html>