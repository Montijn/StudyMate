<table>
    <thead>
        <tr>
            <th scope="col">Module</th>
            <th scope="col">Beschrijving</th>
            <th scope="col">Toetsing</th>
            <th scope="col">Deadline</th>
            <th scope="col">Docent</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @foreach($modules as $module)
            <tr>
                <td>{{$module->moduleName}}</td>
                <td>{{$module->exam->name}}</td>
                <td>{{$module->exam->examType}}</td>
                <td>{{$module->exam->deadline}}</td>
                @foreach($module->Coordinator as $coordinator)
                    <td>{{$coordinator->firstname}} {{$coordinator->infix}} {{$coordinator->lastname}}</td>
                @endforeach
                <td>
                    <form action="{{route('deadlines.edit', $module->exam_id)}}">
                        <button class="btn btn-primary">Bekijk deadline</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
