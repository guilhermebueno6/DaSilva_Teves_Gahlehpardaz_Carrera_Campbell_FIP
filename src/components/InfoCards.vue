<template>
  <div class="info-cards">
    <div v-for="card in cards" :key="card.id" class="info-card">
      <InfoCard :card="card" />
    </div>
  </div>
</template>
<script>
import InfoCard from '@/components/InfoCard'; 
export default {
  name: 'InfoCards',
  components: {
    InfoCard
  },
  data () {
    return {
      card: {},
      cards: [
        {
          id: 1,
          icon: '',
          title: 'Card One',
          description: ''
        },
        {
          id: 2,
          icon: '',
          title: 'Card Two',
          description: ''
        },
        {
          id: 3,
          icon: '',
          title: 'Card Three',
          description: ''
        },
        {
          id: 4,
          icon: '',
          title: 'Card Four',
          description: ''
        }
      ]
    }
  }
}
</script>