import { API_URL } from '@env';
import axios from 'axios';
import { StatusBar } from 'expo-status-bar';
import React, { useState, useEffect } from 'react';
import { StyleSheet, Text, View } from 'react-native';

export default function App() {
  const [text, setText] = useState('');

  useEffect(() => {
    axios
      .get(`${API_URL}/hello/world`)
      .then((response) => setText(response.data))
      .catch((error) => setText(error.message));
  }, []);

  return (
    <View style={styles.container}>
      <Text>{text}</Text>
      <StatusBar style="auto" />
    </View>
  );
}

const styles = StyleSheet.create({
  container: {
    flex: 1,
    backgroundColor: '#fff',
    alignItems: 'center',
    justifyContent: 'center',
  },
});
