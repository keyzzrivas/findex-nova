<template>
  <div>
    <Head title="Full Calendar" />

    <Heading class="mb-6">
        Full Calendar
        <p class="text-sm mt-1">
            Crear un calendario usando FullCalendar utilizando la tabla de users,
            <span class="font-mono text-rose-500 rounded">created_at</span> para la fecha en calendario y el nombre de usuario como label
        </p>
    </Heading>

    <Card class="min-h-screen p-3">
        <FullCalendar ref="calendar" :options="calendarOptions" />
    </Card>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import FullCalendar from '@fullcalendar/vue3'
import dayGridPlugin from '@fullcalendar/daygrid'
import timeGridPlugin from '@fullcalendar/timegrid'

const calendar = ref()

const calendarOptions = {
    plugins: [
        dayGridPlugin,
        timeGridPlugin
    ],
    headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay'
    },
    initialView: 'dayGridMonth',
    timeZone: 'UTC',
    events: async function (info, successCallback, failureCallback) {
        try {
            const params = `start=${info.start.toISOString()}&end=${info.end.toISOString()}`
            const { data } = await Nova.request().get(`/nova-vendor/full-calendar/users?${params}`)
            const events = (data.data || []).map((user) => ({
                id: user.id,
                title: user.name,
                start: user.created_at,
                end: user.created_at,
            }))
            successCallback(events)
        } catch (error) {
          failureCallback(error)
        }
    }
}
</script>
