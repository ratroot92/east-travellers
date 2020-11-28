           <!doctype html>
           <html class="no-js" lang="">
           <head>

           </head>
           <body>
           <div class="container-fluid">
           <div class="row">
                      <p style="" style="font-size: 25px;">Basic Information </p>
                      Type:  <p style="">{{$object->type}}</p>
                      Description:  <p style="">{{$object->description}}</p>
                      Name: <p style="">{{$object->name}}</p>
                      Email: <p style="">{{$object->email}}</p>
                      Phone: <p style="">{{$object->phone}}</p>
                      City:  <p style="">{{$object->city}}</p>
                      Number Of TRavellers:  <p style="">{{$object->number_of_travelers}}</p>
                      Travellers Description:  <p style="">{{$object->travelers_description}}</p>
                      Max Price:   <p style="">{{$object->max_price}}</p>
                      Min Price   <p style="">{{$object->min_price}}</p>

                        <p style="">Flight Information  </p>
                        Flight Dated From :   <p style="">{{$object->flight_from ?? ''}}</p>
                        Flight Dated To:   <p style="">{{$object->flight_to ?? ''}}</p>
                        Flight Preffered  Time :  <p style="">{{$object->flight_time ?? ''}}</p>

                         <p style="">Airport Transfer Information  </p>
                         Airport From :    <p style="">{{$object->airport_from ?? ''}}</p>
                         Airport From :    <p style="">{{$object->airport_to ?? ''}}</p>
                         Flight No:  <p style="">{{$object->flight_number ?? ''}}</p>
                         Aiport Dispatch Transport :  <p style="">{{$object->airport_transport ?? ''}}</p>


                         <p style="">Accomodation   Information  </p>
                        Accomodation City: <p style="">{{$object->accomodation_city ?? ''}}</p>
                     Check In  Date:    <p style="">{{$object->accomodation_from ?? ''}}</p>
                     Check Out To:   <p style="">{{$object->accomodation_to ?? ''}}</p>
                     Accomodation Standard:    <p style="">{{$object->accomodation_standard ?? ''}}</p>

                        <p style="">Tours   Information  </p>
                       Tour City : <p style="">{{$object->tour_city  ?? ''}}</p>
                      Tour Date:  <p style="">{{$object->tour_date  ?? ''}}</p>
                        Tour Type:<p style="">{{$object->tour_type  ?? ''}}</p>
                       Tour Period : <p style="">{{$object->tour_period  ?? ''}}</p>


                         <p style="">Tours   Information  </p>
                       Trip From :  <p style="">{{$object->trip_from  ?? ''}}</p>
                       Trip Date:  <p style="">{{$object->trip_to  ?? ''}}</p>
                       Trip Type:  <p style="">{{$object->trip_type  ?? ''}}</p>












           </div>

           </div>

           </body>
           </html>
