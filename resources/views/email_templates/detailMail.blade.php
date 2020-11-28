<div>
    <h1>{{ $object["type"] }} </h1>
    <p>Sender Email {{ $object["email"] }} </p>
    <p>Event Name {{ $object["eventName"] }} </p>
    <p>Event Link  <a target="_blank" href="{{  $object["eventLink"] }}">
        here

    </a> </p>
    <p>Event Email {{ $object["email"] }} </p>
    <p>Inquirer Date    {{ $object["date"] }} </p>
    <p>Inquirer Name  {{ $object["name"] }} </p>
    <p>Inquirer Mobile  {{ $object["phone"] }} </p>
    <p>Inquirer Childs  {{ $object["child"] }} </p>
    <p>Inquirer Adults  {{ $object["adult"] }} </p>
    <p>Description {{ $object["adult"] ?? "No Description provided" }} </p>



</div>
