import { API_URL } from '@env';
import { createApi, fetchBaseQuery } from '@reduxjs/toolkit/query/react';

export const restApi = createApi({
  reducerPath: 'restApi',
  tagTypes: ['Rest'],
  baseQuery: fetchBaseQuery({ baseUrl: `${API_URL}/api/v1` }),
  endpoints: (builder) => ({
    getUsers: builder.query({
      query: () => '/users',
      transformResponse: (response, meta, arg) => response.data,
    }),
    getTasks: builder.query({
      query: () => '/tasks',
      transformResponse: (response, meta, arg) => [
        {
          id: 1,
          title: 'Implement User Authentication',
          description: '',
          dueDate: '2023-09-29T01:57:00.000Z',
          type: 'story',
          priority: 'low',
          status: 'todo',
          tags: ['feature', 'design'],
          estimatedTime: '1d',
          timeSpentOnTask: '1d',
          follow: true,
          unread: false,
        },
        {
          id: 2,
          title: 'Optimize API Endpoints',
          description: '',
          dueDate: '2023-09-29T01:57:00.000Z',
          type: 'story',
          priority: 'medium',
          status: 'blocked',
          tags: ['feature'],
          estimatedTime: '1d',
          timeSpentOnTask: '1d',
          follow: true,
          unread: false,
        },
        {
          id: 3,
          title: 'Create Dashboard UI',
          description: '',
          dueDate: '2023-09-29T01:57:00.000Z',
          type: 'story',
          priority: 'high',
          status: 'blocked',
          tags: ['feature'],
          estimatedTime: '1d',
          timeSpentOnTask: '1d',
          follow: true,
          unread: false,
        },
        {
          id: 4,
          title: 'Implement Search Functionality',
          description: '',
          dueDate: '2023-10-29T01:57:00.000Z',
          type: 'story',
          priority: 'medium',
          status: 'blocked',
          tags: ['feature'],
          estimatedTime: '1d',
          timeSpentOnTask: '1d',
          follow: true,
          unread: false,
        },
      ],
    }),
    addTask: builder.mutation({
      query: (body) => ({
        url: `tasks`,
        method: 'POST',
        body,
      }),
      invalidatesTags: [{ type: 'Rest' }],
    }),
  }),
});

export const { useGetUsersQuery, useGetTasksQuery, useAddTaskMutation } =
  restApi;
