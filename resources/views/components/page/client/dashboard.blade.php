<div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-5">
    <x-countdown />
    <x-cards.client.dashboard :timId="$data['timId']" :nameTim="$data['nameTim']" :order="$data['order']" :participants="$data['participants']" :submission="$data['submission']" :eventName="$data['eventName']"/>
</div>
