@extends('parts.board')
@section('title', 'Boards')
@section('content')
    <div class="flex p-3 rounded-md justify-between bg-zinc-900 w-full text-center">
        <a class="flex p-2 transition rounded-md bg-emerald-700 hover:bg-emerald-600"
           href="/dashboard/boards/{{$board->id}}/savingtargets">Back</a>
        <div class="text-3xl text-white w-full justify-center flex flex-nowrap space-x-4">
            Savingtarget<div class="w-1/4 text-emerald-700"> {{$savingtarget->name}}</div>
        </div>
        <a class="flex p-2 transition rounded-md bg-emerald-700 hover:bg-emerald-600"
           href="/dashboard/boards/{{$board->id}}/savingtargets/edit">Edit</a>
    </div>
    <div class="flex p-3 rounded-md justify-around bg-zinc-900 w-full text-center mt-10">
        <div class="w-2/5 rounded-md p-3 bg-zinc-700 border-l-4 border-emerald-700">
            <div class="text-3xl text-white w-full justify-center">
                Savingtarget information
            </div>
            <div class="pt-4 px-7 w-full justify-start flex-col">
            <div class="flex text-left  text-2xl">Description</div>
                <div class="flex text-gray-400">@isset($savingtarget->description) {{$savingtarget->description}} @else No discription @endisset</div>
                <div class="flex text-2xl">Goal value</div>
                <div class="flex text-green-400 ">@isset($savingtarget->value) €{{$savingtarget->value}} @else No goal value @endisset</div>
                <div class="flex text-2xl">URL</div>
                <div class="flex text-gray-400">@isset($savingtarget->attachment)
                        <a class="text-blue-600 underline flex flex-row items-center" href="{{$savingtarget->attachment}}"><img class="w-5 h-5 bottom-0 mr-2" src="{{$savingtarget->attachment}}/favicon.ico">{{substr($savingtarget->attachment,0,30).'  .  .  .'}}</a> @else No URL. @endisset</div>
            <div class="flex text-gray-500"> Created at: {{$savingtarget->created_at->format('d/m/Y H:i')}} ({{$savingtarget->created_at->diffInDays(now())}} days ago) </div>
                @if($board->type == 'team')
                    <div class="flex text-gray-500"> by: {{$savingtarget->user->name}} </div>
                    @endif
            </div>
        </div>
        <div class="w-2/5 rounded-md justify-center p-3 bg-zinc-700 border-l-4 border-emerald-700">
            <div class="text-3xl text-white w-full justify-center">
                Savingtarget progress
            </div>
            <div class="pt-4 px-7 w-full justify-start flex-col">

                <div class="flex text-2xl">Savingtarget togo</div>
                <div class="flex text-green-400 ">@isset($savingtarget->value) €{{$savingtarget->value - $savingtarget->total}} ({{100 - floor($savingtarget->total / $savingtarget->value *100)}}%) @else No goal value @endisset</div>

                <div class="flex text-2xl">Target date</div>
                <div class="flex text-gray-400">@isset($savingtarget->deadline) {{$savingtarget->deadline}} ({{$savingtarget->countdown}} days to-go) @else No target date @endisset</div>
            <div class="flex flex-row justify-between mr-4">
                <div>
                <div class="flex text-2xl">Per week:</div>
                <div class="flex text-gray-400">@isset($savingtarget->deadline) €{{floor($savingtarget->value / ($savingtarget->interval / 7))}} @else No deadline set (cant calculate) @endisset</div>
                </div>
                <div>
                <div class="flex text-2xl">Per month:</div>
                    <div class="flex text-gray-400">@isset($savingtarget->deadline) €{{floor($savingtarget->value / ($savingtarget->interval / 30))}} @else No deadline set (cant calculate) @endisset</div>
                </div>
                </div>

            </div>
        </div>
    </div>
    <div class="flex p-3 rounded-md justify-center-3/4 bg-zinc-900 w-full text-center mt-5">
        <div class="relative flex bottom h-10 w-full bg-gray-400 rounded dark:bg-gray-700">
            <div style="width: @if($savingtarget->total < $savingtarget->value){{$progress = floor($savingtarget->total / $savingtarget->value * 100)}}@else{{$progress = 100}}@endif%" class="absolute bg-emerald-700 text-xs font-large text-blue-100 flex p-5 leading-none rounded">
            </div>
            <div class="z-10 relative w-full h-full flex justify-center text-2xl text-center">{{$progress}}%</div>
        </div>
    </div>

@endsection
