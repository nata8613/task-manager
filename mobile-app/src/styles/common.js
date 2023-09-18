import { StyleSheet } from 'react-native';

import theme from '../constants/theme';

const globalStyles = StyleSheet.create({
  label: {
    color: theme.colors.primary,
    marginBottom: theme.spacing.extraSmall,
    marginLeft: theme.spacing.small,
    fontSize: theme.typography.fontSize.small,
    textTransform: 'uppercase',
  },
});

export default globalStyles;
