<div>
    <ul>
        @foreach($services as $service)
        <?php
        $checked = false;

        if ($request) {
            $serviceIds = collect($request->input('services'));

            $checked = $serviceIds->contains($service->serviceId);
        }
        ?>
        <li class="text-left">
            {{Form::checkbox('services[]', $service->serviceId, $checked, ['id' => $service->name])}}
            {{ Form::label($service->name, $service->name) }}
        </li>
        
        @endforeach
    </ul>
</div>