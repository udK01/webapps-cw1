{{-- I understand this doesn't follow snake case, but I am scared something will break if I edit it. --}}
<div>
    <form wire:submit="submit">
        @csrf
        {{-- Comment --}}
        <h1>""</h1>
        @error('description')<span class="center" style="color:red;">{{$message}}</span>@enderror
        <input type="text" wire:model="description" name="description" value ="{{ old('description') }}" 
        style="border: 1px solid;border-color: black;padding: 10px;box-shadow: 5px 10px #808080;
        height: 125px;width: 750px;position: relative;top: 20px;" placeholder="Comment">
        {{-- Submit Button --}}
        <input type="submit" value="Submit" 
        style="position: absolute; border: 1px solid;border-color: green;padding: 10px;
        box-shadow: 5px 10px #00FF00;margin-top: 165px; right: 580px;font-size: 125%;">
    </form>
</div>