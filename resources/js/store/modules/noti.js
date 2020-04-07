
export default {
    namespaced:true,
    state: {
            error:null,
            success:null,
    },
    mutations: 
    {
        SET_ERROR(state,payload)
        {
            state.error=payload;
        },
        SET_SUCCESS(state,payload)
        {
            
            state.success=payload;
        }
    },
    actions: {
  
     
    },
    getters: {
      
            // error(state)
            // {
            //     return state.error;
            // },
            // success(state)
            // {
            //     return state.success;
            // }
      
    }
  }