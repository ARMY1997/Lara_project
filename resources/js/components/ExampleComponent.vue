<template>
    <section>
    <div class="container">
      <div class="task_list__header">
        <div class="buttons">
          <button class="button is-success is-outlined" >Лечатся</button>
          <button class="button is-success is-outlined" >Вылеченые</button>
          <button class="button is-success is-outlined">Все пациенты</button>
        </div>
      </div>
      <div class="task-list">
        <div class="task-item">
          <div class="ui-card ui-card--shadow">
            <div class="task-item__info">
              <div class="task-item__main-info">
                <span class="ui-label ui-label--light">Имя</span>
              </div>
              <button class="button-close"></button>
            </div>
            <div class="task-item__content">
              <div class="task-item__header">
                <div class="ui-checkbox-wrapper">
                  <input class="ui-checkbox" type="checkbox"  />
                </div>
                <span class="ui-title-3"></span>
              </div>
              <div class="task-item__body">
                <p>Жалобы: </p>
                <p>Диагноз: </p>
                <p>Рекомендации по лечению: </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
