@section('Menu')
    <nav class="navbar navbar-inverse">
        <div class="container-fluid" >
            <ul class="nav navbar-nav">
                <li class="active"><a href={{route('home')}}>Home</a></li>
                <li><a href={{route('AktivLinks')}}>gültige links</a></li>
                <li><a href={{route('AllLinks')}}>alle links</a></li>
            </ul>
        </div>
    </nav>
@endsection

@section ('Form')
<form method="post" action={{route('home')}} enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="upload">Upload File:</label>
        <input type="file" id="upload" name="File" class="btn btn-success" placeholder="Enter File"/></br>
        <label for="File Name" class="">File Name</label>
        <input type="text" id="File Name" name="Name" classe="" placeholder="Tragen Sie den Name der Deite ein"/></br>
        <label for="Gultigab" >Gultig ab</label>
        <input id="Gultigab" name="Gultigab" type="date" /></br>
        <label for="GultigBis">Gultig Bis</label>
        <input type="date" id="GultigBis" name="GultigBis"/></br>
        <label for="Beschreibung" class="">inhalt Beschreibung </label>
        <textarea  id="Beschreibung" classe="" name="inhaltbeschreibung" rows="4" cols="25"></textarea></br>
    </div>
    <input name="Senden" id="submit" class="green" type="submit" value="hochladen" />
</form>
@endsection



<!--
@section ('FormInTable')
<form method="post" action={{route('home')}} enctype="multipart/form-data">
@csrf
<div class="form-group">
<label for="upload">Upload File:</label>
<input type="file" id="upload" name="File" class="btn btn-success" placeholder="Enter File"/>
<table>
<tr>
<td>
<label for="File Name" class="">File Name</label>
</td>
<td>
<input type="text" id="File Name" name="Name" classe="" placeholder="Tragen Sie den Name der Deite ein"/>
</td>
</tr>
<tr>
<td>
<label for="Beschreibung" class="">inhalt Beschreibung </label>
</td>
<td>
<input type="text" id="Beschreibung" classe="" name="inhaltbeschreibung"/>
</td>
</tr>
<tr>
<td><label for="Gultigab" >Gultig ab</label></td>
<td><input id="Gultigab" name="Gultigab" type="date" /></td>
</tr>
<tr>
<td><label for="GultigBis">Gultig Bis</label></td>
<td><input type="date" id="GultigBis" name="GultigBis"/> </td>
</tr>
</table>
</div>
<input name="Senden" id="submit" class="green" type="submit" value="senden" />
</form>
@endsection

-->

