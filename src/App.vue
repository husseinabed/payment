<template>
  <v-app>
    <v-app-bar
      app
      color="primary"
      dark
    >
      
      
    <v-toolbar-title class="white--text">تحويل الاموال</v-toolbar-title>
    <v-spacer></v-spacer>
    <img
      src="/images/header-top.png"
      height="115%"
    />  
    </v-app-bar>

    <v-main>
      <v-container>


        <v-card color="rgba(255,255,255,0.7)">
          <v-card-text class="pb-12 pt-4">
            <span class="subtitle " > مرحبا بك في نظام سحب الارباح من المنطقة الاسثمارية </span>
            <div style=" clear: both;"></div>
            <a href="#" @click.prevent="email" class="d-flex float-left">لمراستلنا الرجاء الضغط هنا</a>
            <div style=" clear: both;"></div>
            <v-divider class="my-4"></v-divider>
            <h1 class="headline-custom text-center">الرجاء اختر البنك</h1>

            <v-row>
              <v-col cols="12" md="4" class="mb-6" v-for="(bank, ind) in banks" :key="ind">
                <v-sheet @click="openDialog({ 
                  title: bank.title,
                  logo: bank.logo, 
                  bg: bank.bg, 
                  styles: bank.styles, 
                  
                  })"  rounded :class="['pa-2', 'box18', bank.class]"  elevation="4"  height="135px" >
                    <img contain :src="bank.src" width="100%" height="120px"  alt="" />
                    <div class="box-content">
                        <span class="post">اضغط هنا</span>
                    </div>
                </v-sheet>
              </v-col>
            </v-row>


          </v-card-text>
        </v-card>
      </v-container>

    
    </v-main>
    <DialogEmail v-model="emailDialog" @success="showMessage"/>
    <DialogPrivacy v-model="privacy" />
    <DialogForm @email="emailDialog = true" v-model="dialog.value" :title="dialog.title" :logo="dialog.logo" :bg="dialog.bg" :styles="dialog.styles" />

    <v-snackbar v-model="snackbar" multi-line color="green">{{snackbarTxt}}</v-snackbar>

    <v-footer color="primary" dark>
      <div class="d-block">
              
                  <a href="index.php" target="_self" style="color: #FFF;">تحديث الصفحة</a>
                |
                  <a href="#" @click.prevent="privacy = true" style="color: #FFF;" data-toggle="modal" data-target="#privacyModal">الخصوصية</a>
                
            </div>
            <v-spacer></v-spacer>
      <div  class="text-center" style="font-size: 11px;"> جميع الحقوق محفوظة © 2020</div>
      <v-spacer></v-spacer>
      <img src="/images/logo-footer.png" width="250px" class="pa-2"  alt=""/>
    </v-footer>
  </v-app>
</template>

<script>
import DialogPrivacy from './components/Privacy'
import DialogForm from './components/Dialog'
import DialogEmail from './components/Email'
export default {
  name: 'App',
  components: {
    DialogPrivacy,
    DialogForm,
    DialogEmail
  },

 
  data: () => ({
    privacy: false,
    emailDialog: false,
    snackbar:false,
    snackbarTxt: 'Demo',
    dialog: {
      value: false,
      title: 'Title'
    },
    banks: [
      { src: '/images/rajhi-logo.png', class: 'rajhiclick', title: 'مصرف الراجحي', logo: '/images/modal-rajhi-top.png', bg: '/images/rajhi-bank.jpg', styles: { backgroundColor: '#1b4596'} },
      { src: '/images/al-ahli.png', class: 'alahliclick', title: 'بنك الأهلي', logo: '/images/logos/al-ahli.png', bg: '/images/logos/ahliback.jpg', styles: { 'background-color': '#f4f2f0' } },
      { src: '/images/samba.jpeg', class: 'sambaclick', title: 'مصرف سامبا', logo: '/images/logos/samba-logo.jpg', bg: '/images/logos/sambaback.png', styles: { 'background-image': 'url(/images/logos/top-header-samba.jpg)' } },
      { src: '/images/sab.png', class: 'saabclick', title: 'مصرف ساب', logo: '/images/logos/570x87-sabb-logo.png', bg: '/images/logos/saabback.png', styles: { 'background-color': '#f4f2f0' } },
      { src: '/images/1111.png', class: 'saudifaclick', title: 'السعودي الفرنسي كابيتال', logo: '/images/logos/saudifrance.png', bg: '/images/logos/saudifranceback.jpg', styles: { 'background-color': '#f4f2f0' } },
      { src: '/images/al-riyadh.png', class: 'ariydhclick', title: 'بنك الرياض', logo: '/images/logos/alriyad-logo.png', bg: '/images/logos/riyadh-back.jpg', styles: { 'background-color': '#f4f2f0' } },
      { src: '/images/al-jazirah.png', class: 'alarabiclick', title: 'بنك العربي', logo: '/images/logos/alarabilogo.png', bg: '/images/logos/ANB.jpg', styles: { 'background-color': '#0073cf' } },
      { src: '/images/al-awal.jpg', class: 'alawalclick', title: 'البنك الأول', logo: '/images/logos/alawwal-bank-logo.png', bg: '/images/logos/card-titanium.png', styles: { 'background-color': '#f4f2f0' } },
      { src: '/images/al-jazirah.jpg', class: 'aljazeeraclick', title: 'بنك الجزيرة', logo: '/images/logos/BAJ_logo-trans.png', bg: '/images/logos/aljazeeraback.jpg', styles: { 'background-color': '#0e416b' } },
      { src: '/images/al-saudi.jpg', class: 'saudiinvestclick', title: 'البنك السعودي للأستثمار', logo: '/images/logos/logosaib.png', bg: '/images/logos/saudiinvestback.jpg', styles: { 'background-color': '#f4f2f0' } },
      { src: '/images/blad.png', class: 'albiladclick', title: 'بنك البلاد', logo: '/images/logos/albiladlogo.png', bg: '/images/logos/albiladback.png', styles: { 'background-color': '#f4f2f0' } },
      { src: '/images/al-inmaa.jpg', class: 'alinmaaclick', title: 'مصرف الأنماء', logo: '/images/logos/inmaLogo.png', bg: '/images/logos/alinmaaback.jpg', styles: { 'background-color': '#f4f2f0' } },

    ]
  }),
  methods: {
    email () {
      this.emailDialog = true
    },
    showMessage () {
      this.snackbarTxt = 'تم ارسال الرسالة بنجاح'
      this.snackbar = true
    },
    openDialog (opt) {
       
      this.dialog.value = true
      this.dialog.title = opt.title
      this.dialog.logo = opt.logo
      this.dialog.bg = opt.bg
      this.dialog.styles = opt.styles || {}
    }
  }
};
</script>

<style >
* {
  font-family: Almarai !important;
}

.headline-custom {
  font-size: 1.5rem !important;
  font-weight: 700;
  line-height: 2rem;
  letter-spacing: normal !important;
  
}
.box {
  width: 100%;
  height: 120px;
}

#app {
    font-family: 'Almarai', sans-serif;
    background: url(/images/main-bg.png) no-repeat 0 0 / auto !important;
    background-position: top center !important;
}
</style>