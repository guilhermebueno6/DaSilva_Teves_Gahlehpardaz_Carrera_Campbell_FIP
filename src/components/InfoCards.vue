<template>
  <section class="services">
    <div class="info-cards" id="services">
      <div v-for="card in cards" :key="card.id" class="info-card">
        <InfoCard :card="card" />
      </div>
    </div>
  </section>
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
          icon: 'fas fa-building',
          title: 'John Gordon Home',
          description: 'We provide support to people with HIV/AIDS and HCV (Hepatitis C) who have immediate healthcare needs to realize positive health and wellness outcome'
        },
        {
          id: 2,
          icon: 'fas fa-user-md',
          title: 'Prep Clinic',
          description: 'The RHAC PrEP clinic is currently held every second Friday. PrEP, or pre-exposure prophylaxis, is a medication that can be taken daily to prevent HIV.'
        },
        {
          id: 3,
          icon: 'far fa-star',
          title: 'Open Closet',
          description: 'Open Closet is a social support group for LGBT2Q+ (lesbian, gay, bi, trans, 2-spirit, queer) youth between 14 and 18 years of age.'
        },
        {
          id: 4,
          icon: 'far fa-plus-square',
          title: 'Newly Diagnosed',
          description: 'When you first test positive for HIV or Hepatitis C it is normal to feel afraid and confused. It is important to know neither diagnosis is a death sentence, and you are not alone in your journey.'
        }
      ]
    }
  }
}
</script>