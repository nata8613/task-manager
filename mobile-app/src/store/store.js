import { configureStore } from '@reduxjs/toolkit';
import { restApi } from './services/rest';

export const store = configureStore({
  reducer: {
    [restApi.reducerPath]: restApi.reducer,
  },
  middleware: (getDefaultMiddleware) =>
    getDefaultMiddleware().concat(restApi.middleware),
});
