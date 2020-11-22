<template>
  <v-row justify="center">
    <v-dialog
      :value="value"
      @input="$emit('input',$event)"
      scrollable
      max-width="550px"
    >
      <v-card>
        <v-card-title>
          <v-icon>mdi-message</v-icon>
          <v-spacer></v-spacer>
          راسلنا
          <v-spacer></v-spacer>
          <v-btn icon @click="$emit('input',false)">
            <v-icon>mdi-close</v-icon>
          </v-btn>
          
        
        </v-card-title>
        <v-divider></v-divider>
        <v-card-text style="height: 450px;" class="py-4">
          <br>
          <v-form ref="form">
            <v-row>
              <v-col cols="12" md="6" class="py-0">
                <v-text-field name="first_name" outlined dense rounded placeholder="*الأسم الاول" :rules="[v => !!v || 'هذا الحقل مطلوب']"></v-text-field>
              </v-col>
              <v-col cols="12" md="6" class="py-0">
                <v-text-field name="last_name" outlined dense rounded placeholder="*الأسم الاخير" :rules="[v => !!v || 'هذا الحقل مطلوب']"></v-text-field>
              </v-col>
              <v-col cols="12" class="py-0" >
                <v-text-field  name="email" outlined dense rounded placeholder="*البريد الالكتروني" :rules="[v => !!v || 'هذا الحقل مطلوب']"></v-text-field>
              </v-col>
              <v-col cols="12" class="py-0">
                <v-text-field  name="subject" outlined dense rounded placeholder="الموضوع" ></v-text-field>
              </v-col>
              <v-col cols="12" class="py-0" >
                <v-textarea name="message" outlined dense rounded placeholder="*الرسالة..." :rules="[v => !!v || 'هذا الحقل مطلوب']"></v-textarea>
              </v-col>
            </v-row>
          </v-form>
        </v-card-text>
        <v-divider></v-divider>
        <v-card-actions>
          <v-btn
            color="green"
             :dark="!loading"
            :disabled="loading"
            :loading="loading"
            @click="send"
          >
            ارسال
          </v-btn>
          <v-btn
            color="red"
             :dark="!loading"
            :disabled="loading"
            @click="reset"
          >
            مسح
          </v-btn>
          <v-spacer></v-spacer>
          <v-btn
            text
            @click="$emit('input', false)"
          >
            أغلاق
          </v-btn>
           
        </v-card-actions>
      </v-card>
    </v-dialog>
  </v-row>
</template>

<script>
import axios from 'axios'
  export default {
    name: 'Email',
    props: {
      value: Boolean
    },
    data: () => ({
      loading: false
    }),
    methods: {
      reset () {
        this.$refs['form'].reset()
      },
      send () {
        const form = this.$refs['form']
        if (form.validate()) {
          this.loading = true
          const formData = new FormData()
          form.inputs.forEach(input => {
            const field = input.$el.querySelector('input, textarea')
            formData.append(field.name, field.value)
          })
          axios.post('/sendmessage.php',formData).then(res => {
            console.log(res);
            this.loading = false
            form.reset()
            this.$emit('success')
            setTimeout(() => {

              this.$emit('input', false)
            }, 50)
          }).catch(err=> {
            this.loading = false
            console.log(err);
          })


          this.loading = false
        }
      }
    } 
  }
</script>
